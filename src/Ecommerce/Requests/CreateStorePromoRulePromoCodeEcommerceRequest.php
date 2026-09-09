<?php

namespace Mailchimp\Ecommerce\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class CreateStorePromoRulePromoCodeEcommerceRequest extends JsonSerializableType
{
    /**
     * @var string $code The discount code. Restricted to UTF-8 characters with max length 50.
     */
    #[JsonProperty('code')]
    public string $code;

    /**
     * @var ?string $createdAtForeign The date and time the promotion was created in ISO 8601 format.
     */
    #[JsonProperty('created_at_foreign')]
    public ?string $createdAtForeign;

    /**
     * @var ?bool $enabled Whether the promo code is currently enabled.
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var string $id A unique identifier for the promo code. Restricted to UTF-8 characters with max length 50.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $redemptionUrl The url that should be used in the promotion campaign restricted to UTF-8 characters with max length 2000.
     */
    #[JsonProperty('redemption_url')]
    public string $redemptionUrl;

    /**
     * @var ?string $updatedAtForeign The date and time the promotion was updated in ISO 8601 format.
     */
    #[JsonProperty('updated_at_foreign')]
    public ?string $updatedAtForeign;

    /**
     * @var ?int $usageCount Number of times promo code has been used.
     */
    #[JsonProperty('usage_count')]
    public ?int $usageCount;

    /**
     * @param array{
     *   code: string,
     *   id: string,
     *   redemptionUrl: string,
     *   createdAtForeign?: ?string,
     *   enabled?: ?bool,
     *   updatedAtForeign?: ?string,
     *   usageCount?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->code = $values['code'];
        $this->createdAtForeign = $values['createdAtForeign'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->id = $values['id'];
        $this->redemptionUrl = $values['redemptionUrl'];
        $this->updatedAtForeign = $values['updatedAtForeign'] ?? null;
        $this->usageCount = $values['usageCount'] ?? null;
    }
}
