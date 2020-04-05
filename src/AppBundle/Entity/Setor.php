<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Setor
 *
 * @ORM\Table(name="setor")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SetorRepository")
 */
class Setor
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Crud", mappedBy="setor")
     */
    private $funcionario;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_setor", type="string", length=30)
     */
    private $nomeSetor;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=255)
     */
    private $descricao;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomeSetor
     *
     * @param string $nomeSetor
     *
     * @return Setor
     */
    public function setNomeSetor($nomeSetor)
    {
        $this->nomeSetor = $nomeSetor;

        return $this;
    }

    /**
     * Get nomeSetor
     *
     * @return string
     */
    public function getNomeSetor()
    {
        return $this->nomeSetor;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return Setor
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set funcionario
     *
     * @param string $descricao
     *
     * @return Setor
     */
    public function setFuncionario($funcionario)
    {
        $this->funcionario = $funcionario;

        return $this;
    }

    /**
     * Get funcionario
     *
     * @return string
     */
    public function getFuncionario()
    {
        return $this->funcionario;
    }

    public function __construct()
    {
        $this->funcionario = new ArrayCollection();
    }
}
