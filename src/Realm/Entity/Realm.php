<?php
namespace Keycloak\Realm\Entity;

use JsonSerializable;
use Keycloak\JsonDeserializable;

/**
 * Class Realm
 * @package Keycloak\Realm\Entity
 */
class Realm implements JsonSerializable, JsonDeserializable
{
    /**
     * @var string|null
     */
    public $id;

    /**
     * @var string|null
     */
    public $realm;

    /**
     * @var string|null
     */
    public $displayName;

    /**
     * @var string|null
     */
    public $enabled;

    /**
     * @var string|null
     */
    public $sslRequired;

    /**
     * @var string|null
     */
    public $registrationAllowed;

    /**
     * @var string|null
     */
    public $loginWithEmailAllowed;

    /**
     * @var string|null
     */
    public $duplicateEmailsAllowed;

    /**
     * @var string|null
     */
    public $resetPasswordAllowed;

    /**
     * @var string|null
     */
    public $editUsernameAllowed;

    /**
     * @var string|null
     */
    public $bruteForceProtected;

    /**
     * @param string|null $id
     * @param string|null $realm
     * @param string|null $displayName
     * @param string|null $enabled
     * @param string|null $sslRequired
     * @param string|null $registrationAllowed
     * @param string|null $loginWithEmailAllowed
     * @param string|null $duplicateEmailsAllowed
     * @param string|null $resetPasswordAllowed
     * @param string|null $editUsernameAllowed
     * @param string|null $bruteForceProtected
     */

    public function __construct(
        ?string $id,
        ?string $realm,
        ?string $displayName,
        ?string $enabled,
        ?string $sslRequired,
        ?string $registrationAllowed,
        ?string $loginWithEmailAllowed,
        ?string $duplicateEmailsAllowed,
        ?string $resetPasswordAllowed,
        ?string $editUsernameAllowed,
        ?string $bruteForceProtected,
    ) {
        $this->id = $id;
        $this->realm = $realm;
        $this->displayName = $displayName;
        $this->enabled = $enabled;
        $this->sslRequired = $sslRequired;
        $this->registrationAllowed = $registrationAllowed;
        $this->loginWithEmailAllowed = $loginWithEmailAllowed;
        $this->duplicateEmailsAllowed = $duplicateEmailsAllowed;
        $this->resetPasswordAllowed = $resetPasswordAllowed;
        $this->editUsernameAllowed = $editUsernameAllowed;
        $this->bruteForceProtected = $bruteForceProtected;
    }

    /**
     * @return Realm
     */
    public function jsonSerialize(): Realm
    {
        return $this;
    }

    /**
     * @param string|array $json
     * @return Realm
     */
    public static function fromJson($json): self
    {
        $arr = is_array($json) ? $json : json_decode($json, true);
        return new self(
            $arr['id'] ?: "false",
            $arr['realm'] ?: "false",
            $arr['displayName'] ?? null,
            $arr['enabled'] ? "true" : "false",
            $arr['sslRequired'] ?: "false",
                $arr['registrationAllowed'] ?: "false",
                $arr['loginWithEmailAllowed'] ? "true" : "false",
            $arr['duplicateEmailsAllowed'] ?: "false",
            $arr['resetPasswordAllowed'] ?: "false",
            $arr['editUsernameAllowed'] ?: "false",
            $arr['bruteForceProtected'] ?: "false"
        );
    }
}
