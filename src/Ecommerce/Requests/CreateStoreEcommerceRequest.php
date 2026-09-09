<?php

namespace Mailchimp\Ecommerce\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Ecommerce\Types\CreateStoreEcommerceRequestAddress;
use Mailchimp\Core\Json\JsonProperty;

class CreateStoreEcommerceRequest extends JsonSerializableType
{
    /**
     * @var ?CreateStoreEcommerceRequestAddress $address The store address.
     */
    #[JsonProperty('address')]
    public ?CreateStoreEcommerceRequestAddress $address;

    /**
     * @var string $currencyCode The three-letter ISO 4217 code for the currency that the store accepts.
     */
    #[JsonProperty('currency_code')]
    public string $currencyCode;

    /**
     * @var ?string $domain The store domain. This parameter is required for Connected Sites and Google Ads.
     */
    #[JsonProperty('domain')]
    public ?string $domain;

    /**
     * @var ?string $emailAddress The email address for the store.
     */
    #[JsonProperty('email_address')]
    public ?string $emailAddress;

    /**
     * @var string $id The unique identifier for the store.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?bool $isSyncing Whether to disable automations because the store is currently [syncing](https://mailchimp.com/developer/marketing/docs/e-commerce/#pausing-store-automations).
     */
    #[JsonProperty('is_syncing')]
    public ?bool $isSyncing;

    /**
     * @var string $listId The unique identifier for the list associated with the store. The `list_id` for a specific store cannot change.
     */
    #[JsonProperty('list_id')]
    public string $listId;

    /**
     * @var ?string $moneyFormat The currency format for the store. For example: `$`, `£`, etc.
     */
    #[JsonProperty('money_format')]
    public ?string $moneyFormat;

    /**
     * @var string $name The name of the store.
     */
    #[JsonProperty('name')]
    public string $name;

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
     * @param array{
     *   currencyCode: string,
     *   id: string,
     *   listId: string,
     *   name: string,
     *   address?: ?CreateStoreEcommerceRequestAddress,
     *   domain?: ?string,
     *   emailAddress?: ?string,
     *   isSyncing?: ?bool,
     *   moneyFormat?: ?string,
     *   phone?: ?string,
     *   platform?: ?string,
     *   primaryLocale?: ?string,
     *   timezone?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->address = $values['address'] ?? null;
        $this->currencyCode = $values['currencyCode'];
        $this->domain = $values['domain'] ?? null;
        $this->emailAddress = $values['emailAddress'] ?? null;
        $this->id = $values['id'];
        $this->isSyncing = $values['isSyncing'] ?? null;
        $this->listId = $values['listId'];
        $this->moneyFormat = $values['moneyFormat'] ?? null;
        $this->name = $values['name'];
        $this->phone = $values['phone'] ?? null;
        $this->platform = $values['platform'] ?? null;
        $this->primaryLocale = $values['primaryLocale'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
    }
}
