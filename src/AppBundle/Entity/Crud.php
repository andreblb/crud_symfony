<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Crud
 *
 * @ORM\Table(name="funcionarios")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CrudRepository")
 */
class Crud
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
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=50)
     */

    private $nome;

    /**
    *
    * @ORM\ManyToOne(targetEntity="Setor", inversedBy="funcionarios")
    * @ORM\JoinColumn(name="setor_id", referencedColumnName="id")
    */
   private $setor;

    /**
     * @var string
     *
     * @ORM\Column(name="nascimento", type="string", length=10)
     */
    private $nascimento;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", length=20)
     */
    private $cpf;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco", type="string", length=255)
     */
    private $endereco;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=60)
     */
    private $email;


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
     * Set nome
     *
     * @param string $nome
     *
     * @return Crud
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set nascimento
     *
     * @param string $nascimento
     *
     * @return Crud
     */
    public function setNascimento($nascimento)
    {
        $this->nascimento = $nascimento;

        return $this;
    }

    /**
     * Get nascimento
     *
     * @return string
     */
    public function getNascimento()
    {
        return $this->nascimento;
    }

    /**
     * Set cpf
     *
     * @param string $cpf
     *
     * @return Crud
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get cpf
     *
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set endereco
     *
     * @param string $endereco
     *
     * @return Crud
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get endereco
     *
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Crud
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set setor
     *
     * @param int $setor
     *
     * @return Crud
     */
    public function setNomeSetor($setor)
    {
        $this->setor = $setor;

        return $this;
    }

    /**
     * Get setor
     *
     * @return int
     */
    public function getNomeSetor()
    {
        return $this->setor;
    }
}
