<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * Information about an Ecommerce Store's specific Promo Code
 */
class ECommercePromoCode extends JsonSerializableType
{
    /**
     * @var ?array<ECommercePromoCodeLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ECommercePromoCodeLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $code The discount code. Restricted to UTF-8 characters with max length 50.
     */
    #[JsonProperty('code')]
    public ?string $code;

    /**
     * @var ?DateTime $createdAtForeign The date and time the promotion was created in ISO 8601 format.
     */
    #[JsonProperty('created_at_foreign'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAtForeign;

    /**
     * @var ?bool $enabled Whether the promo code is currently enabled.
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?string $id A unique identifier for the promo Code.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $redemptionUrl The url that should be used in the promotion campaign restricted to UTF-8 characters with max length 2000.
     */
    #[JsonProperty('redemption_url')]
    public ?string $redemptionUrl;

    /**
     * @var ?DateTime $updatedAtForeign The date and time the promotion was updated in ISO 8601 format.
     */
    #[JsonProperty('updated_at_foreign'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAtForeign;

    /**
     * @var ?int $usageCount Number of times promo code has been used.
     */
    #[JsonProperty('usage_count')]
    public ?int $usageCount;

    /**
     * @param array{
     *   links?: ?array<ECommercePromoCodeLinksItem>,
     *   code?: ?string,
     *   createdAtForeign?: ?DateTime,
     *   enabled?: ?bool,
     *   id?: ?string,
     *   redemptionUrl?: ?string,
     *   updatedAtForeign?: ?DateTime,
     *   usageCount?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->code = $values['code'] ?? null;
        $this->createdAtForeign = $values['createdAtForeign'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->redemptionUrl = $values['redemptionUrl'] ?? null;
        $this->updatedAtForeign = $values['updatedAtForeign'] ?? null;
        $this->usageCount = $values['usageCount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
