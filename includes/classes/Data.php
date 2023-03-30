<?php
/* the factors will include: number of times leading a platoon, number of times in a position of leadership, number of times commanding a tank,
number of times participating in a paradrop, number of times participating as an infantryman, number of times surviving a whole mission, number of times
number of tanks destroyed as an infantryman, number of tanks destroyed as a tank gunner or with an at gun, number of times being a tank driver, number of times
being a tank crewman, and the number of missions participated in.*/

/* the attendance data will be stored in a database, and will be shared with all users. the attendance data will be stored in a table called data */
class Data
{

    private int $id;
    public string $username;
    private int $times_leading_platoon;
    private int $times_as_leadership;
    private int $times_commanding_tank;
    private int $times_participating_paradrop;
    private int $times_participating_infantryman;
    private int $times_surviving_whole_mission;
    private int $tanks_destroyed_light;
    private int $tanks_destroyed_heavy;
    private int $times_being_tank_driver;
    private int $times_being_tank_crewman;
    private int $times_participating_mission;

    // First, I have all relevant getters and setters

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return int
     */
    public function getTimesLeadingPlatoon(): int
    {
        return $this->times_leading_platoon;
    }

    /**
     * @return int
     */
    public function getTimesAsLeadership(): int
    {
        return $this->times_as_leadership;
    }

    /**
     * @return int
     */
    public function getTimesCommandingTank(): int
    {
        return $this->times_commanding_tank;
    }

    /**
     * @return int
     */
    public function getTimesParticipatingParadrop(): int
    {
        return $this->times_participating_paradrop;
    }

    /**
     * @return int
     */
    public function getTimesParticipatingInfantryman(): int
    {
        return $this->times_participating_infantryman;
    }

    /**
     * @return int
     */
    public function getTimesSurvivingWholeMission(): int
    {
        return $this->times_surviving_whole_mission;
    }

    /**
     * @return int
     */
    public function getTanksDestroyedLight(): int
    {
        return $this->tanks_destroyed_light;
    }

    /**
     * @return int
     */
    public function getTanksDestroyedHeavy(): int
    {
        return $this->tanks_destroyed_heavy;
    }

    /**
     * @return int
     */
    public function getTimesBeingTankDriver(): int
    {
        return $this->times_being_tank_driver;
    }

    /**
     * @return int
     */
    public function getTimesBeingTankCrewman(): int
    {
        return $this->times_being_tank_crewman;
    }

    /**
     * @return int
     */
    public function getTimesParticipatingMission(): int
    {
        return $this->times_participating_mission;
    }

    // Increment the different factors in database

    public function incrementTimesLeadingPlatoon(): void
    {
        $temp = $this->getTimesLeadingPlatoon();
        $temp = $temp + 1;

        $pdo = Database::getConnection();

        $statement = $pdo->prepare('UPDATE data SET times_leading_platoon = :times_leading_platoon WHERE id = :id');
        $statement->execute(['times_leading_platoon' => $temp, 'id' => $this->id]);
    }

    public function incrementTimesAsLeadership(): void
    {
        $temp = $this->getTimesAsLeadership();
        $temp = $temp + 1;

        $pdo = Database::getConnection();

        $statement = $pdo->prepare('UPDATE data SET times_as_leadership = :times_as_leadership WHERE id = :id');
        $statement->execute(['times_as_leadership' => $temp, 'id' => $this->id]);
    }

    public function incrementTimesCommandingTank(): void
    {
        $temp = $this->getTimesCommandingTank();
        $temp = $temp + 1;

        $pdo = Database::getConnection();

        $statement = $pdo->prepare('UPDATE data SET times_commanding_tank = :times_commanding_tank WHERE id = :id');
        $statement->execute(['times_commanding_tank' => $temp, 'id' => $this->id]);
    }

    public function incrementTimesParticipatingParadrop(): void
    {
        $temp = $this->getTimesParticipatingParadrop();
        $temp = $temp + 1;

        $pdo = Database::getConnection();

        $statement = $pdo->prepare('UPDATE data SET times_participating_paradrop = :times_participating_paradrop WHERE id = :id');
        $statement->execute(['times_participating_paradrop' => $temp, 'id' => $this->id]);
    }

    public function incrementTimesParticipatingInfantryman(): void
    {
        $temp = $this->getTimesParticipatingInfantryman();
        $temp = $temp + 1;

        $pdo = Database::getConnection();

        $statement = $pdo->prepare('UPDATE data SET times_participating_infantryman = :times_participating_infantryman WHERE id = :id');
        $statement->execute(['times_participating_infantryman' => $temp, 'id' => $this->id]);
    }

    public function incrementTimesSurvivingWholeMission(): void
    {
        $temp = $this->getTimesSurvivingWholeMission();
        $temp = $temp + 1;

        $pdo = Database::getConnection();

        $statement = $pdo->prepare('UPDATE data SET times_surviving_whole_mission = :times_surviving_whole_mission WHERE id = :id');
        $statement->execute(['times_surviving_whole_mission' => $temp, 'id' => $this->id]);
    }

    public function incrementTanksDestroyedLight(): void
    {
        $temp = $this->getTanksDestroyedLight();
        $temp = $temp + 1;

        $pdo = Database::getConnection();

        $statement = $pdo->prepare('UPDATE data SET tanks_destroyed_light = :tanks_destroyed_light WHERE id = :id');
        $statement->execute(['tanks_destroyed_light' => $temp, 'id' => $this->id]);
    }

    public function incrementTanksDestroyedHeavy(): void
    {
        $temp = $this->getTanksDestroyedHeavy();
        $temp = $temp + 1;

        $pdo = Database::getConnection();

        $statement = $pdo->prepare('UPDATE data SET tanks_destroyed_heavy = :tanks_destroyed_heavy WHERE id = :id');
        $statement->execute(['tanks_destroyed_heavy' => $temp, 'id' => $this->id]);
    }

    public function incrementTimesBeingTankDriver(): void
    {
        $temp = $this->getTimesBeingTankDriver();
        $temp = $temp + 1;

        $pdo = Database::getConnection();

        $statement = $pdo->prepare('UPDATE data SET times_being_tank_driver = :times_being_tank_driver WHERE id = :id');
        $statement->execute(['times_being_tank_driver' => $temp, 'id' => $this->id]);
    }

    public function incrementTimesBeingTankCrewman(): void
    {
        $temp = $this->getTimesBeingTankCrewman();
        $temp = $temp + 1;

        $pdo = Database::getConnection();

        $statement = $pdo->prepare('UPDATE data SET times_being_tank_crewman = :times_being_tank_crewman WHERE id = :id');
        $statement->execute(['times_being_tank_crewman' => $temp, 'id' => $this->id]);
    }

    public function incrementTimesParticipatingMission(): void
    {
        $temp = $this->getTimesParticipatingMission();
        $temp = $temp + 1;

        $pdo = Database::getConnection();

        $statement = $pdo->prepare('UPDATE data SET times_participating_mission = :times_participating_mission WHERE id = :id');
        $statement->execute(['times_participating_mission' => $temp, 'id' => $this->id]);

    }

    public function decrementTimesLeadingPlatoon(): void
    {
        $temp = $this->getTimesLeadingPlatoon();
        $temp = $temp - 1;

        $pdo = Database::getConnection();

        $statement = $pdo->prepare('UPDATE data SET times_leading_platoon = :times_leading_platoon WHERE id = :id');
        $statement->execute(['times_leading_platoon' => $temp, 'id' => $this->id]);
    }

    public function decrementTimesAsLeadership(): void
    {
        $temp = $this->getTimesAsLeadership();
        $temp = $temp - 1;

        $pdo = Database::getConnection();

        $statement = $pdo->prepare('UPDATE data SET times_as_leadership = :times_as_leadership WHERE id = :id');
        $statement->execute(['times_as_leadership' => $temp, 'id' => $this->id]);
    }

    public function decrementTimesCommandingTank(): void
    {
        $temp = $this->getTimesCommandingTank();
        $temp = $temp - 1;

        $pdo = Database::getConnection();

        $statement = $pdo->prepare('UPDATE data SET times_commanding_tank = :times_commanding_tank WHERE id = :id');
        $statement->execute(['times_commanding_tank' => $temp, 'id' => $this->id]);
    }

    public function decrementTimesParticipatingParadrop(): void
    {
        $temp = $this->getTimesParticipatingParadrop();
        $temp = $temp - 1;

        $pdo = Database::getConnection();

        $statement = $pdo->prepare('UPDATE data SET times_participating_paradrop = :times_participating_paradrop WHERE id = :id');
        $statement->execute(['times_participating_paradrop' => $temp, 'id' => $this->id]);
    }

    public function decrementTimesParticipatingInfantryman(): void
    {
        $temp = $this->getTimesParticipatingInfantryman();
        $temp = $temp - 1;

        $pdo = Database::getConnection();

        $statement = $pdo->prepare('UPDATE data SET times_participating_infantryman = :times_participating_infantryman WHERE id = :id');
        $statement->execute(['times_participating_infantryman' => $temp, 'id' => $this->id]);
    }

    public function decrementTimesSurvivingWholeMission(): void
    {
        $temp = $this->getTimesSurvivingWholeMission();
        $temp = $temp - 1;

        $pdo = Database::getConnection();

        $statement = $pdo->prepare('UPDATE data SET times_surviving_whole_mission = :times_surviving_whole_mission WHERE id = :id');
        $statement->execute(['times_surviving_whole_mission' => $temp, 'id' => $this->id]);
    }

    public function decrementTanksDestroyedLight(): void
    {
        $temp = $this->getTanksDestroyedLight();
        $temp = $temp - 1;

        $pdo = Database::getConnection();

        $statement = $pdo->prepare('UPDATE data SET tanks_destroyed_light = :tanks_destroyed_light WHERE id = :id');
        $statement->execute(['tanks_destroyed_light' => $temp, 'id' => $this->id]);
    }

    public function decrementTanksDestroyedHeavy(): void
    {
        $temp = $this->getTanksDestroyedHeavy();
        $temp = $temp - 1;

        $pdo = Database::getConnection();

        $statement = $pdo->prepare('UPDATE data SET tanks_destroyed_heavy = :tanks_destroyed_heavy WHERE id = :id');
        $statement->execute(['tanks_destroyed_heavy' => $temp, 'id' => $this->id]);
    }

    public function decrementTimesBeingTankDriver(): void
    {
        $temp = $this->getTimesBeingTankDriver();
        $temp = $temp - 1;

        $pdo = Database::getConnection();

        $statement = $pdo->prepare('UPDATE data SET times_being_tank_driver = :times_being_tank_driver WHERE id = :id');
        $statement->execute(['times_being_tank_driver' => $temp, 'id' => $this->id]);
    }

    public function decrementTimesBeingTankCrewman(): void
    {
        $temp = $this->getTimesBeingTankCrewman();
        $temp = $temp - 1;

        $pdo = Database::getConnection();

        $statement = $pdo->prepare('UPDATE data SET times_being_tank_crewman = :times_being_tank_crewman WHERE id = :id');
        $statement->execute(['times_being_tank_crewman' => $temp, 'id' => $this->id]);
    }

    public function decrementTimesParticipatingMission(): void
    {
        $temp = $this->getTimesParticipatingMission();
        $temp = $temp - 1;

        $pdo = Database::getConnection();

        $statement = $pdo->prepare('UPDATE data SET times_participating_mission = :times_participating_mission WHERE id = :id');
        $statement->execute(['times_participating_mission' => $temp, 'id' => $this->id]);
    }

    // This method is used to find the data of a player using id

    public static function find($id): Data|bool
    {
        $pdo = Database::getConnection();

        $statement = $pdo->prepare('SELECT * FROM data WHERE id = :id');
        $statement->execute(['id' => $id]);
        $data = $statement->fetchObject(Data::class);

        if ($data === false) {
            return false;
        }

        return $data;

    }

    // This method returns the data of all players

    public static function all(): array
    {
        $pdo = Database::getConnection();

        $statement = $pdo->prepare('SELECT * FROM data');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, Data::class);
    }

    // Create new player with default values

    public static function create(string $username): Data
    {
            $pdo = Database::getConnection();

            $statement = $pdo->prepare('INSERT INTO data (username) VALUES (:username)');
            $statement->execute(['username' => $username]);
            return self::find($pdo->lastInsertId());
    }

    // This method is used to delete a player

    public function delete()
    {
        $pdo = Database::getConnection();

        $statement = $pdo->prepare('DELETE FROM data WHERE id = :id');
        $statement->execute(['id' => $this->id]);
    }

}