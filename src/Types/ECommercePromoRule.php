<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * Information about an Ecommerce Store's specific Promo Rule
 */
class ECommercePromoRule extends JsonSerializableType
{
    /**
     * @var ?array<ECommercePromoRuleLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ECommercePromoRuleLinksItem::class])]
    public ?array $links;

    /**
     * @var ?float $amount The amount of the promo code discount. If 'type' is 'fixed', the amount is treated as a monetary value. If 'type' is 'percentage', amount must be a decimal value between 0.0 and 1.0, inclusive.
     */
    #[JsonProperty('amount')]
    public ?float $amount;

    /**
     * @var ?DateTime $createdAtForeign The date and time the promotion was created in ISO 8601 format.
     */
    #[JsonProperty('created_at_foreign'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAtForeign;

    /**
     * @var ?string $description The description of a promotion restricted to UTF-8 characters with max length 255.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?bool $enabled Whether the promo rule is currently enabled.
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?string $endsAt The date and time when the promotion ends. Must be after starts_at and in ISO 8601 format.
     */
    #[JsonProperty('ends_at')]
    public ?string $endsAt;

    /**
     * @var ?string $id A unique identifier for the promo rule. If Ecommerce platform does not support promo rule, use promo code id as promo rule id. Restricted to UTF-8 characters with max length 50.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?DateTime $startsAt The date and time when the promotion is in effect in ISO 8601 format.
     */
    #[JsonProperty('starts_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startsAt;

    /**
     * @var ?value-of<ECommercePromoRuleTarget> $target The target that the discount applies to.
     */
    #[JsonProperty('target')]
    public ?string $target;

    /**
     * @var ?string $title The title that will show up in promotion campaign. Restricted to UTF-8 characters with max length of 100 bytes.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?value-of<ECommercePromoRuleType> $type Type of discount. For free shipping set type to fixed.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?DateTime $updatedAtForeign The date and time the promotion was updated in ISO 8601 format.
     */
    #[JsonProperty('updated_at_foreign'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAtForeign;

    /**
     * @param array{
     *   links?: ?array<ECommercePromoRuleLinksItem>,
     *   amount?: ?float,
     *   createdAtForeign?: ?DateTime,
     *   description?: ?string,
     *   enabled?: ?bool,
     *   endsAt?: ?string,
     *   id?: ?string,
     *   startsAt?: ?DateTime,
     *   target?: ?value-of<ECommercePromoRuleTarget>,
     *   title?: ?string,
     *   type?: ?value-of<ECommercePromoRuleType>,
     *   updatedAtForeign?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->amount = $values['amount'] ?? null;
        $this->createdAtForeign = $values['createdAtForeign'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->endsAt = $values['endsAt'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->startsAt = $values['startsAt'] ?? null;
        $this->target = $values['target'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->updatedAtForeign = $values['updatedAtForeign'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
