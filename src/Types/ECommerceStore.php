<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * An individual store in an account.
 */
class ECommerceStore extends JsonSerializableType
{
    /**
     * @var ?array<ECommerceStoreLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ECommerceStoreLinksItem::class])]
    public ?array $links;

    /**
     * @var ?ECommerceStoreAddress $address The store address.
     */
    #[JsonProperty('address')]
    public ?ECommerceStoreAddress $address;

    /**
     * @var ?ECommerceStoreAutomations $automations Details for the automations attached to this store.
     */
    #[JsonProperty('automations')]
    public ?ECommerceStoreAutomations $automations;

    /**
     * @var ?ECommerceStoreConnectedSite $connectedSite The Connected Site associated with the store.
     */
    #[JsonProperty('connected_site')]
    public ?ECommerceStoreConnectedSite $connectedSite;

    /**
     * @var ?DateTime $createdAt The date and time the store was created in ISO 8601 format.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $currencyCode The three-letter ISO 4217 code for the currency that the store accepts.
     */
    #[JsonProperty('currency_code')]
    public ?string $currencyCode;

    /**
     * @var ?string $domain The store domain.  The store domain must be unique within a user account.
     */
    #[JsonProperty('domain')]
    public ?string $domain;

    /**
     * @var ?string $emailAddress The email address for the store.
     */
    #[JsonProperty('email_address')]
    public ?string $emailAddress;

    /**
     * @var ?string $id The unique identifier for the store.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $isSyncing Whether to disable automations because the store is currently [syncing](https://mailchimp.com/developer/marketing/docs/e-commerce/#pausing-store-automations).
     */
    #[JsonProperty('is_syncing')]
    public ?bool $isSyncing;

    /**
     * @var ?string $listId The unique identifier for the list that's associated with the store. The `list_id` for a specific store can't change.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?bool $listIsActive The status of the list connected to the store, namely if it's deleted or disabled.
     */
    #[JsonProperty('list_is_active')]
    public ?bool $listIsActive;

    /**
     * @var ?string $moneyFormat The currency format for the store. For example: `$`, `£`, etc.
     */
    #[JsonProperty('money_format')]
    public ?string $moneyFormat;

    /**
     * @var ?string $name The name of the store.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $phone The store phone number.
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?string $platform The e-commerce platform of the store.
     */
    #[JsonProperty('platform')]
    public ?string $platform;

    /**
     * @var ?string $primaryLocale The primary locale for the store. For example: `en`, `de`, etc.
     */
    #[JsonProperty('primary_locale')]
    public ?string $primaryLocale;

    /**
     * @var ?string $timezone The timezone for the store.
     */
    #[JsonProperty('timezone')]
    public ?string $timezone;

    /**
     * @var ?DateTime $updatedAt The date and time the store was last updated in ISO 8601 format.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   links?: ?array<ECommerceStoreLinksItem>,
     *   address?: ?ECommerceStoreAddress,
     *   automations?: ?ECommerceStoreAutomations,
     *   connectedSite?: ?ECommerceStoreConnectedSite,
     *   createdAt?: ?DateTime,
     *   currencyCode?: ?string,
     *   domain?: ?string,
     *   emailAddress?: ?string,
     *   id?: ?string,
     *   isSyncing?: ?bool,
     *   listId?: ?string,
     *   listIsActive?: ?bool,
     *   moneyFormat?: ?string,
     *   name?: ?string,
     *   phone?: ?string,
     *   platform?: ?string,
     *   primaryLocale?: ?string,
     *   timezone?: ?string,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->address = $values['address'] ?? null;
        $this->automations = $values['automations'] ?? null;
        $this->connectedSite = $values['connectedSite'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->currencyCode = $values['currencyCode'] ?? null;
        $this->domain = $values['domain'] ?? null;
        $this->emailAddress = $values['emailAddress'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->isSyncing = $values['isSyncing'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->listIsActive = $values['listIsActive'] ?? null;
        $this->moneyFormat = $values['moneyFormat'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->platform = $values['platform'] ?? null;
        $this->primaryLocale = $values['primaryLocale'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
