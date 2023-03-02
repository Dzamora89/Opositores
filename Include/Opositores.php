<?php

class Opositores
{
    private $dniopo;
    private $nomopo;
    private $ciuopo;
    private $cpopo;
    private $tfalu;
    private $tribunalOpo;

    /**
     * @param $dniopo
     * @param $nomopo
     * @param $ciuopo
     * @param $cpopo
     * @param $tfalu
     * @param $tribunalOpo
     */
    public function __construct(array $fila)
    {
        $this->dniopo = $fila['DNIOPO'];
        $this->nomopo = $fila['NOMOPO'];
        $this->ciuopo = $fila['CIUOPO'];
        $this->cpopo = $fila['CPOPO'];
        $this->tfalu = $fila['TFALU'];
        $this->tribunalOpo = $fila['TRIBUNALOPO'];
    }

    /**
     * @return mixed
     */
    public function getDniopo(): mixed
    {
        return $this->dniopo;
    }

    /**
     * @param mixed $dniopo
     */
    public function setDniopo(mixed $dniopo): void
    {
        $this->dniopo = $dniopo;
    }

    /**
     * @return mixed
     */
    public function getNomopo(): mixed
    {
        return $this->nomopo;
    }

    /**
     * @param mixed $nomopo
     */
    public function setNomopo(mixed $nomopo): void
    {
        $this->nomopo = $nomopo;
    }

    /**
     * @return mixed
     */
    public function getCiuopo(): mixed
    {
        return $this->ciuopo;
    }

    /**
     * @param mixed $ciuopo
     */
    public function setCiuopo(mixed $ciuopo): void
    {
        $this->ciuopo = $ciuopo;
    }

    /**
     * @return mixed
     */
    public function getCpopo(): mixed
    {
        return $this->cpopo;
    }

    /**
     * @param mixed $cpopo
     */
    public function setCpopo(mixed $cpopo): void
    {
        $this->cpopo = $cpopo;
    }

    /**
     * @return mixed
     */
    public function getTfalu(): mixed
    {
        return $this->tfalu;
    }

    /**
     * @param mixed $tfalu
     */
    public function setTfalu(mixed $tfalu): void
    {
        $this->tfalu = $tfalu;
    }

    /**
     * @return mixed
     */
    public function getTribunalOpo(): mixed
    {
        return $this->tribunalOpo;
    }

    /**
     * @param mixed $tribunalOpo
     */
    public function setTribunalOpo(mixed $tribunalOpo): void
    {
        $this->tribunalOpo = $tribunalOpo;
    }


}