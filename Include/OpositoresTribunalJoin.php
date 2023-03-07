<?php

class OpositoresTribunalJoin
{
    private $dniopo;
    private $nomopo;
    private $ciuopo;
    private $cpopo;
    private $tfalu;
    private $tribunalOpo;
    private $codigotri;
    private $presidente;
    private $secretario;
    private $vocal1;
    private $vocal2;
    private $vocal3;

    /**
     * @param $dniopo
     * @param $nomopo
     * @param $ciuopo
     * @param $cpopo
     * @param $tfalu
     * @param $tribunalOpo
     * @param $codigotri
     * @param $presidente
     * @param $secretario
     * @param $vocal1
     * @param $vocal2
     * @param $vocal3
     */
    public function __construct(array $fila)
    {
        $this->dniopo = $fila['DNIOPO'];
        $this->nomopo = $fila['NOMOPO'];
        $this->ciuopo = $fila['CIUOPO'];
        $this->cpopo = $fila['CPOPO'];
        $this->tfalu = $fila['TFALU'];
        $this->tribunalOpo = $fila['TRIBUNALOPO'];
        $this->codigotri = $fila['CODIGOTRI'];
        $this->presidente = $fila['PRESIDENTE'];
        $this->secretario = $fila['SECRETARIO'];
        $this->vocal1 = $fila['VOCAL1'];
        $this->vocal2 = $fila['VOCAL2'];
        $this->vocal3 = $fila['VOCAL3'];
    }

    /**
     * @return mixed
     */
    public function getDniopo()
    {
        return $this->dniopo;
    }

    /**
     * @param mixed $dniopo
     */
    public function setDniopo($dniopo): void
    {
        $this->dniopo = $dniopo;
    }

    /**
     * @return mixed
     */
    public function getNomopo()
    {
        return $this->nomopo;
    }

    /**
     * @param mixed $nomopo
     */
    public function setNomopo($nomopo): void
    {
        $this->nomopo = $nomopo;
    }

    /**
     * @return mixed
     */
    public function getCiuopo()
    {
        return $this->ciuopo;
    }

    /**
     * @param mixed $ciuopo
     */
    public function setCiuopo($ciuopo): void
    {
        $this->ciuopo = $ciuopo;
    }

    /**
     * @return mixed
     */
    public function getCpopo()
    {
        return $this->cpopo;
    }

    /**
     * @param mixed $cpopo
     */
    public function setCpopo($cpopo): void
    {
        $this->cpopo = $cpopo;
    }

    /**
     * @return mixed
     */
    public function getTfalu()
    {
        return $this->tfalu;
    }

    /**
     * @param mixed $tfalu
     */
    public function setTfalu($tfalu): void
    {
        $this->tfalu = $tfalu;
    }

    /**
     * @return mixed
     */
    public function getTribunalOpo()
    {
        return $this->tribunalOpo;
    }

    /**
     * @param mixed $tribunalOpo
     */
    public function setTribunalOpo($tribunalOpo): void
    {
        $this->tribunalOpo = $tribunalOpo;
    }

    /**
     * @return mixed
     */
    public function getCodigotri()
    {
        return $this->codigotri;
    }

    /**
     * @param mixed $codigotri
     */
    public function setCodigotri($codigotri): void
    {
        $this->codigotri = $codigotri;
    }

    /**
     * @return mixed
     */
    public function getPresidente()
    {
        return $this->presidente;
    }

    /**
     * @param mixed $presidente
     */
    public function setPresidente($presidente): void
    {
        $this->presidente = $presidente;
    }

    /**
     * @return mixed
     */
    public function getSecretario()
    {
        return $this->secretario;
    }

    /**
     * @param mixed $secretario
     */
    public function setSecretario($secretario): void
    {
        $this->secretario = $secretario;
    }

    /**
     * @return mixed
     */
    public function getVocal1()
    {
        return $this->vocal1;
    }

    /**
     * @param mixed $vocal1
     */
    public function setVocal1($vocal1): void
    {
        $this->vocal1 = $vocal1;
    }

    /**
     * @return mixed
     */
    public function getVocal2()
    {
        return $this->vocal2;
    }

    /**
     * @param mixed $vocal2
     */
    public function setVocal2($vocal2): void
    {
        $this->vocal2 = $vocal2;
    }

    /**
     * @return mixed
     */
    public function getVocal3()
    {
        return $this->vocal3;
    }

    /**
     * @param mixed $vocal3
     */
    public function setVocal3($vocal3): void
    {
        $this->vocal3 = $vocal3;
    }



}
