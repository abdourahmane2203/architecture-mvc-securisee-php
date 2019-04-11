<?php
/**
 * Created by PhpStorm.
 * User: Diallo
 * Date: 10/04/2019
 * Time: 12:22
 */

class Ferme
{
    private $_id;
    private $_nom;

    public function __construct(array $data)
    {
    }
    // HYDRATATION DEE DONNEES => POUR CHARGER LES SETTERS
    public function hydrate($data) {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key); // EX : ['nom' => 'Diallo' ] => setNom('Diallo');
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    // GEETTERS

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->_nom;
    }
    // SETTERS

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        if (is_int($id) && $id > 0){
            $this->_id = $id;
        }
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        if (is_string($nom)) {
            $this->_nom = $nom;
        }
    }
}