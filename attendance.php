<?php
require __DIR__ . '/includes/config.php';

/*this page will allow the admins to note down attendance, for several factors. the attendance data will be shared for all users*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Attendance</title>
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/modal.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
    <body>
        <main class="h-screen">
            <a href="index.php" class="text-2xl font-bold text-center absolute top-3 right-0 p-4">Back</a>
            <a href="newData.php" class="text-2xl font-bold text-center absolute top-3 left-0 p-4">New Player Entry</a>

            <!--hidden pop-up window to ask for confirmation of deleting a record, in the center of the screen-->
            <?php
/*                //check if the delete button has been pressed. if so, show the pop-up window
                if (isset($_GET['delete'])) {
                    echo '<div class="fixed top-0 left-0 w-full h-full flex items-center justify-center">
                            <div class="absolute w-full h-full bg-gray-900 opacity-50"></div>
                            <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                                <div class="py-4 text-left px-6">
                                    <div class="flex justify-between items-center pb-3">
                                        <p class="text-2xl font-bold">Delete Record</p>
                                        <div class="cursor-pointer z-50" id="close-modal">
                                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                <path d="M14.348 14.849c-0.469 0.469-1.229 0.469-1.697 0l-1.151-1.152-1.152 1.152c-0.469 0.469-1.229 0.469-1.697 0s-0.469-1.229 0-1.697l1.152-1.152-1.152-1.152c-0.469-0.469-0.469-1.229 0-1.697s1.229-0.469 1.697 0l1.152 1.152 1.152-1.152c0.469-0.469 1.229-0.469 1.697 0s0.469 1.229 0 1.697l-1.152 1.152 1.152 1.152c0.469 0.469 0.469 1.229 0 1.697z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <p>Are you sure you want to delete this record?</p>
                                </div>
                                <div class="flex justify-end pt-2">
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-l" id="delete-record">Delete</button
                                    <button class="bg-gray-500 hover:b-gray-700 text-white font-bold py-2 px-4 rounded-r" id="close-modal">Cancel</button>
                                </div>
                            </div>
                        </div>';
                }
            */?>


            <!--<div class="fixed top-0 left-0 w-full h-full flex items-center justify-center">
                <div class="absolute w-full h-full bg-gray-900 opacity-50"></div>
                <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                    <div class="py-4 text-left px-6">
                        <div class="flex justify-between items-center pb-3">
                            <p class="text-2xl font-bold">Delete Record</p>
                            <div class="cursor-pointer z-50" id="close-modal">
                                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                    <path d="M14.348 14.849c-0.469 0.469-1.229 0.469-1.697 0l-1.151-1.152-1.152 1.152c-0.469 0.469-1.229 0.469-1.697 0s-0.469-1.229 0-1.697l1.152-1.152-1.152-1.152c-0.469-0.469-0.469-1.229 0-1.697s1.229-0.469 1.697 0l1.152 1.152 1.152-1.152c0.469-0.469 1.229-0.469 1.697 0s0.469 1.229 0 1.697l-1.152 1.152 1.152 1.152c0.469 0.469 0.469 1.229 0 1.697z"/>
                                </svg>
                            </div>
                        </div>
                        <p>Are you sure you want to delete this record?</p>
                    </div>
                    <div class="flex justify-end pt-2">
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-l" id="delete-record">Delete</button>
                        <button class="bg-gray-500 hover:b-gray-700 text-white font-bold py-2 px-4 rounded-r" id="close-modal">Cancel</button>
                    </div>
                </div>
            </div>-->


        <h1 class="text-6xl font-bold text-center top-0 p-4 pb-6">23rd HQ Panel - Attendance Monitor</h1>
            <div class="flex flex-col items-center justify-center align-middle">
                <table class="table-auto">
                    <thead>
                    <tr>
                        <th class=" px-10 py-5">Player</th>
                        <th class=" px-4 py-2">Times as Platoon Leader</th>
                        <th class=" px-4 py-2">Times as Leadership</th>
                        <th class=" px-4 py-2">Times commanding tank</th>
                        <th class=" px-4 py-2">Times participating paradrop</th>
                        <th class=" px-4 py-2">Times participating as infantryman</th>
                        <th class=" px-4 py-2">Times surviving whole mission</th>
                        <th class=" px-4 py-2">Tanks destroyed - Light</th>
                        <th class=" px-4 py-2">Tanks destroyed - Heavy</th>
                        <th class=" px-4 py-2">Times as tank driver</th>
                        <th class=" px-4 py-2">Times as tank crewman</th>
                        <th class=" px-4 py-2">Times participating in mission</th>
                        <th class=" px-4 py-2">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach(Data::all() as $datapoint):?>
                        <tr>
                            <td class="border px-4 py-2"><?php echo($datapoint->getUsername()) ?></td>
                            <td class="border px-4 py-2">
                                <div class="flex justify-between">
                                    <form action="/decrement-platoon-leader.php" method="post">
                                        <input type="hidden" name="id" value="<?= $datapoint->getId(); ?>">
                                        <input type="hidden" name="field" value="timesLeadingPlatoon">
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-800">
                                            -
                                        </button>
                                    </form>
                                    <p class="px-2 py-2"><?php echo($datapoint->getTimesLeadingPlatoon()) ?></p>
                                    <form action="/increment-platoon-leader.php" method="post">
                                        <input type="hidden" name="id" value="<?= $datapoint->getId(); ?>">
                                        <input type="hidden" name="field" value="timesLeadingPlatoon">
                                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-800">
                                            +
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="border px-4 py-2%">
                                <div class="flex justify-between">
                                    <form action="/decrement-leadership.php" method="post">
                                        <input type="hidden" name="id" value="<?= $datapoint->getId(); ?>">
                                        <input type="hidden" name="field" value="timesAsLeadership">
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-800">
                                            -
                                        </button>
                                    </form>
                                    <p class="px-2 py-2"><?php echo($datapoint->getTimesAsLeadership()) ?></p>
                                    <form action="/increment-leadership.php" method="post">
                                        <input type="hidden" name="id" value="<?= $datapoint->getId(); ?>">
                                        <input type="hidden" name="field" value="timesAsLeadership">
                                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-800">
                                            +
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="border px-4 py-2">
                                <div class="flex justify-between">
                                    <form action="/decrement-tank-commander.php" method="post">
                                        <input type="hidden" name="id" value="<?= $datapoint->getId(); ?>">
                                        <input type="hidden" name="field" value="timesCommandingTank">
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-800">
                                            -
                                        </button>
                                    </form>
                                    <p class="px-2 py-2"><?php echo($datapoint->getTimesCommandingTank()) ?></p>
                                    <form action="/increment-tank-commander.php" method="post">
                                        <input type="hidden" name="id" value="<?= $datapoint->getId(); ?>">
                                        <input type="hidden" name="field" value="timesCommandingTank">
                                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-800">
                                            +
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="border px-4 py-2">
                                <div class="flex justify-between">
                                    <form action="/decrement-paradrop.php" method="post">
                                        <input type="hidden" name="id" value="<?= $datapoint->getId(); ?>">
                                        <input type="hidden" name="field" value="timesParticipatingParadrop">
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-800">
                                            -
                                        </button>
                                    </form>
                                    <p class="px-2 py-2"><?php echo($datapoint->getTimesParticipatingParadrop()) ?></p>
                                    <form action="/increment-paradrop.php" method="post">
                                        <input type="hidden" name="id" value="<?= $datapoint->getId(); ?>">
                                        <input type="hidden" name="field" value="timesParticipatingParadrop">
                                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-800">
                                            +
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="border px-4 py-2">
                                <div class="flex justify-between">
                                    <form action="/decrement-infantry.php" method="post">
                                        <input type="hidden" name="id" value="<?= $datapoint->getId(); ?>">
                                        <input type="hidden" name="field" value="timesParticipatingInfantry">
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-800">
                                            -
                                        </button>
                                    </form>
                                    <p class="px-2 py-2"><?php echo($datapoint->getTimesParticipatingInfantryman()) ?></p>
                                    <form action="/increment-infantry.php" method="post">
                                        <input type="hidden" name="id" value="<?= $datapoint->getId(); ?>">
                                        <input type="hidden" name="field" value="timesParticipatingInfantry">
                                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-800">
                                            +
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="border px-4 py-2">
                                <div class="flex justify-between">
                                    <form action="/decrement-survival.php" method="post">
                                        <input type="hidden" name="id" value="<?= $datapoint->getId(); ?>">
                                        <input type="hidden" name="field" value="timesSurvivingWholeMission">
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-800">
                                            -
                                        </button>
                                    </form>
                                    <p class="px-2 py-2"><?php echo($datapoint->getTimesSurvivingWholeMission()) ?></p>
                                    <form action="/increment-survival.php" method="post">
                                        <input type="hidden" name="id" value="<?= $datapoint->getId(); ?>">
                                        <input type="hidden" name="field" value="timesSurvivingWholeMission">
                                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-800">
                                            +
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="border px-4 py-2">
                                <div class="flex justify-between">
                                    <form action="/decrement-light-tank.php" method="post">
                                        <input type="hidden" name="id" value="<?= $datapoint->getId(); ?>">
                                        <input type="hidden" name="field" value="tanksDestroyedLight">
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-800">
                                            -
                                        </button>
                                    </form>
                                    <p class="px-2 py-2"><?php echo($datapoint->getTanksDestroyedLight()) ?></p>
                                    <form action="/increment-light-tank.php" method="post">
                                        <input type="hidden" name="id" value="<?= $datapoint->getId(); ?>">
                                        <input type="hidden" name="field" value="tanksDestroyedLight">
                                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-800">
                                            +
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="border px-4 py-2">
                                <div class="flex justify-between">
                                    <form action="/decrement-heavy-tank.php" method="post">
                                        <input type="hidden" name="id" value="<?= $datapoint->getId(); ?>">
                                        <input type="hidden" name="field" value="tanksDestroyedHeavy">
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-800">
                                            -
                                        </button>
                                    </form>
                                    <p class="px-2 py-2"><?php echo($datapoint->getTanksDestroyedHeavy()) ?></p>
                                    <form action="/increment-heavy-tank.php" method="post">
                                        <input type="hidden" name="id" value="<?= $datapoint->getId(); ?>">
                                        <input type="hidden" name="field" value="tanksDestroyedHeavy">
                                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-800">
                                            +
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="border px-4 py-2">
                                <div class="flex justify-between">
                                    <form action="/decrement-tank-driver.php" method="post">
                                        <input type="hidden" name="id" value="<?= $datapoint->getId(); ?>">
                                        <input type="hidden" name="field" value="timesBeingTankDriver">
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-800">
                                            -
                                        </button>
                                    </form>
                                    <p class="px-2 py-2"><?php echo($datapoint->getTimesBeingTankDriver()) ?></p>
                                    <form action="/increment-tank-driver.php" method="post">
                                        <input type="hidden" name="id" value="<?= $datapoint->getId(); ?>">
                                        <input type="hidden" name="field" value="timesBeingTankDriver">
                                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-800">
                                            +
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="border px-4 py-2">
                                <div class="flex justify-between">
                                    <form action="/decrement-tank-crewman.php" method="post">
                                        <input type="hidden" name="id" value="<?= $datapoint->getId(); ?>">
                                        <input type="hidden" name="field" value="timesBeingTankCrewman">
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-800">
                                            -
                                        </button>
                                    </form>
                                    <p class="px-2 py-2"><?php echo($datapoint->getTimesBeingTankCrewman()) ?></p>
                                    <form action="/increment-tank-crewman.php" method="post">
                                        <input type="hidden" name="id" value="<?= $datapoint->getId(); ?>">
                                        <input type="hidden" name="field" value="timesBeingTankCrewman">
                                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-800">
                                            +
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="border px-4 py-2">
                                <div class="flex justify-between">
                                    <form action="/decrement-participating-mission.php" method="post">
                                        <input type="hidden" name="id" value="<?= $datapoint->getId(); ?>">
                                        <input type="hidden" name="field" value="timesParticipatingMission">
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-800">
                                            -
                                        </button>
                                    </form>
                                    <p class="px-2 py-2"><?php echo($datapoint->getTimesParticipatingMission()) ?></p>
                                    <form action="/increment-participating-mission.php" method="post">
                                        <input type="hidden" name="id" value="<?= $datapoint->getId(); ?>">
                                        <input type="hidden" name="field" value="timesParticipatingMission">
                                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-800">
                                            +
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <!--simple, non modal delete button-->



                            <td class="border px-4 py-2">
                                <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-800" onclick="document.getElementById('id01').style.display='block'">Delete</button>

                                <div id="id01" class="modal">
                                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                                    <form class="modal-content" action="/delete-data.php" method="post">
                                        <div class="container">
                                            <!--little title saying delete account using tailwind css-->
                                            <h1 class="text-2xl font-bold text-center p-2">Delete Account</h1>
                                            <!--little text saying re you sure you want to delete this player? using tailwind css-->
                                            <p class="text-center font-semibold p-5">Are you sure you want to delete this player?</p>

                                            <div class="clearfix">
                                                <!--button to close modal menu-->
                                                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="w-40 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-800">Cancel</button>
                                                    <!--button to delete data using delete-data.php-->
                                                <input type="hidden" name="id" value="<?= $datapoint->getId(); ?>">
                                                <button type="submit" class="w-40 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-800">Delete</button>

                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <script>
                                    // Get the modal
                                    var modal = document.getElementById('id01');

                                    // When the user clicks anywhere outside of the modal, close it
                                    window.onclick = function(event) {
                                        if (event.target == modal) {
                                            modal.style.display = "none";
                                        }
                                    }
                                </script>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </body>
</html>

