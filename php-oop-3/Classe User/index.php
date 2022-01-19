<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    /**
     * 
     *      Definire classe User:
     *          ATTRIBUTI (private):
     *          - username 
     *          - password
     *          - age
     *          
     *          METODI:
     *          - costruttore che accetta username, e password
     *          - proprieta' getter/setter
     *          - printMe: che stampa se stesso
     *          - toString: "username: age [password]"
     * 
     *          ECCEZIONI:
     *          - scatenare eccezione quando username e' minore di 3 caratteri o maggiore di 16
     *          - scatenare eccezione se password non contiene un carattere speciale (non alpha-numerico)
     *          - scatenare eccezione se age non e' un numero
     * 
     *          NOTE:
     *          - per testare il singolo carattere di una stringa
     * 
     *      Testare la classe appena definita con dati corretti e NON corretti all'interno di un
     *      try-catch e eventualmente informare l'utente del problema
     * 
     */

    class User
    {

        // use Printable;

        private $username;
        private $password;
        private $age;

        public function __construct($username, $password)
        {

            $this->setUsername($username);
            $this->setPassword($password);
        }

        // setter e getter
        public function getUsername()
        {

            return $this->username;
        }
        public function setUsername($username)
        {
            if (strlen($username) < 3 || strlen($username) > 16) {
                throw new Exception("Lo username deve essere più lungo di 3 caratteri e più corto di 16 caratteri");
            } else {
                $this->username = $username;
            }
        }

        public function getPassword()
        {
            if (!preg_match("/[\'^£$%&*()}{@#~<>,|=_+¬-]/", $this->password)) {
                throw new Exception("La password deve contenere almeno un carattere speciale.");
            }
            return $this->password;
        }
        public function setPassword($password)
        {

            $this->password = $password;
        }
        public function getAge()
        {

            return $this->age;
        }
        public function setAge($age)
        {
            if (!is_numeric($age))
                throw new Exception("L'età deve essere un numero");
            $this->age = $age;
        }

        // Print me function
        public function printMe()
        {
            echo $this;
        }

        // to string function
        public function __toString()
        {

            return "Username:" . $this->getUsername() . "<br>Age: " . $this->getAge() . "<br>Password: [ " . $this->getPassword() . " ]";
        }
    }

    try {
        $u1 = new User("Pluto123", "abc_123");
        $u1->setAge(22);
        $u1->printMe();
    } catch (Exception $e) {
        echo "<br>" . $e->getMessage();
    }

    ?>

</body>

</html>