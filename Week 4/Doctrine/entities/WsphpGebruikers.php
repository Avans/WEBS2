<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * WsphpGebruikers
 *
 * @ORM\Table(name="wsphp_gebruikers")
 * @ORM\Entity
 */
class WsphpGebruikers
{
    /**
     * @var int
     *
     * @ORM\Column(name="geb_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $gebId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="geb_voornaam", type="string", length=20, nullable=true)
     */
    private $gebVoornaam;

    /**
     * @var string|null
     *
     * @ORM\Column(name="geb_achternaam", type="string", length=40, nullable=true)
     */
    private $gebAchternaam;


    /**
     * Get gebId.
     *
     * @return int
     */
    public function getGebId()
    {
        return $this->gebId;
    }

    /**
     * Set gebVoornaam.
     *
     * @param string|null $gebVoornaam
     *
     * @return WsphpGebruikers
     */
    public function setGebVoornaam($gebVoornaam = null)
    {
        $this->gebVoornaam = $gebVoornaam;

        return $this;
    }

    /**
     * Get gebVoornaam.
     *
     * @return string|null
     */
    public function getGebVoornaam()
    {
        return $this->gebVoornaam;
    }

    /**
     * Set gebAchternaam.
     *
     * @param string|null $gebAchternaam
     *
     * @return WsphpGebruikers
     */
    public function setGebAchternaam($gebAchternaam = null)
    {
        $this->gebAchternaam = $gebAchternaam;

        return $this;
    }

    /**
     * Get gebAchternaam.
     *
     * @return string|null
     */
    public function getGebAchternaam()
    {
        return $this->gebAchternaam;
    }
}
