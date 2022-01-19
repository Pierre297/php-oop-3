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
     *      Definire classe Computer:
     *          ATTRIBUTI:
     *          - codice univoco
     *          - modello
     *          - prezzo
     *          - marca
     * 
     *          METODI:
     *          - costruttore che accetta codice univoco e prezzo
     *          - proprieta' getter/setter per tutte le variabili d'istanza
     *          - printMe: che stampa se stesso (come quella vista a lezione)
     *          - toString: "marca modello: prezzo [codice univoco]"
     * 
     *          ECCEZIONI:
     *          - codice univoco: deve essere composto da esattamente 6 cifre (no altri caratteri)
     *          - marca e modello: devono essere costituiti da stringhe tra i 3 e i 20 caratteri
     *          - prezzo: deve essere un valore intero compreso tra 0 e 2000
     * 
     *      Testare la classe appena definita con tutte le casistiche interessanti per verificare
     *      il corretto funzionamento dell'algoritmo
     * 
     */

    class Computer
    {

        private $codice;
        private $modello;
        private $prezzo;
        private $marca;

        public function __construct($codice, $prezzo)
        {

            $this->setCodice($codice);
            $this->setPrezzo($prezzo);
        }

        // setter e getter
        public function getCodice()
        {

            return $this->codice;
        }
        public function setCodice($codice)
        {
            if (strlen($codice) != 6) {
                throw new Exception("Il codice inserito deve essere lungo 6 cifre.");
            } else {
                $this->codice = $codice;
            }
        }

        public function getPrezzo()
        {

            return $this->prezzo;
        }
        public function setPrezzo($prezzo)
        {
            if (!is_int($prezzo) || $prezzo < 0 || $prezzo > 2000)
                throw new Exception("Il prezzo deve essere un numero intero e non può superare le 2000 cifre.");
            $this->prezzo = $prezzo;
        }
        public function getModello()
        {

            return $this->modello;
        }
        public function setModello($modello)
        {
            if (is_numeric($modello) || strlen($modello) < 3 || strlen($modello) > 20)
                throw new Exception("Il modello inserito non può essere un numero e deve avere almeno 3 caratteri e meno di 20.");
            $this->modello = $modello;
        }

        public function getMarca()
        {

            return $this->marca;
        }
        public function setMarca($marca)
        {
            if (is_numeric($marca) || strlen($marca) < 3 || strlen($marca) > 20)
                throw new Exception("la marca inserita non può essere un numero e deve avere almeno 3 caratteri e meno di 20.");
            $this->marca = $marca;
        }

        // Print me function
        public function printMe()
        {
            echo $this;
        }

        // to string function
        public function __toString()
        {

            return "Codice:" . $this->getCodice() . "<br> Computer: " . $this->getMarca() . " [ " . $this->getModello() . " ]  " . "<br>prezzo: " . $this->getPrezzo() . "$";
        }
    }

    try {
        $c1 = new Computer("123abc", 1200);
        $c1->setMarca("Acer");
        $c1->setModello("Random");
        $c1->printMe();
    } catch (Exception $e) {
        echo "<br>" . $e->getMessage();
    }

    ?>

</body>

</html>