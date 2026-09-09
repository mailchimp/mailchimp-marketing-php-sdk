<?php

namespace Mailchimp\Ecommerce\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Union;
use DateTime;
use Mailchimp\Ecommerce\Types\UpdateStorePromoRuleEcommerceRequestEndsAtOne;
use Mailchimp\Ecommerce\Types\UpdateStorePromoRuleEcommerceRequestStartsAtOne;
use Mailchimp\Ecommerce\Types\UpdateStorePromoRuleEcommerceRequestTarget;
use Mailchimp\Ecommerce\Types\UpdateStorePromoRuleEcommerceRequestType;

class UpdateStorePromoRuleEcommerceRequest extends JsonSerializableType
{
    /**
     * @var (
     *    float
     *   |string
     * )|null $amount
     */
    #[JsonProperty('amount'), Union('float', 'string', 'null')]
    public float|string|null $amount;

    /**
     * @var ?string $createdAtForeign The date and time the promotion was created in ISO 8601 format.
     */
    #[JsonProperty('created_at_foreign')]
    public ?string $createdAtForeign;

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
     * @var (
     *    DateTime
     *   |string
     *   |value-of<UpdateStorePromoRuleEcommerceRequestEndsAtOne>
     * )|null $endsAt
     */
    #[JsonProperty('ends_at'), Union('datetime', 'date', 'string', 'null')]
    public DateTime|string|null $endsAt;

    /**
     * @var ?string $id A unique identifier for the promo rule. If Ecommerce platform does not support promo rule, use promo code id as promo rule id. Restricted to UTF-8 characters with max length 50.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var (
     *    DateTime
     *   |string
     *   |value-of<UpdateStorePromoRuleEcommerceRequestStartsAtOne>
     * )|null $startsAt
     */
    #[JsonProperty('starts_at'), Union('datetime', 'date', 'string', 'null')]
    public DateTime|string|null $startsAt;

    /**
     * @var ?value-of<UpdateStorePromoRuleEcommerceRequestTarget> $target The target that the discount applies to.
     */
    #[JsonProperty('target')]
    public ?string $target;

    /**
     * @var ?string $title The title that will show up in promotion campaign. Restricted to UTF-8 characters with max length of 100 bytes.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?value-of<UpdateStorePromoRuleEcommerceRequestType> $type Type of discount. For free shipping set type to fixed.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?string $updatedAtForeign The date and time the promotion was updated in ISO 8601 format.
     */
    #[JsonProperty('updated_at_foreign')]
    public ?string $updatedAtForeign;

    /**
     * @param array{
     *   amount?: (
     *    float
     *   |string
     * )|null,
     *   createdAtForeign?: ?string,
     *   description?: ?string,
     *   enabled?: ?bool,
     *   endsAt?: (
     *    DateTime
     *   |string
     *   |value-of<UpdateStorePromoRuleEcommerceRequestEndsAtOne>
     * )|null,
     *   id?: ?string,
     *   startsAt?: (
     *    DateTime
     *   |string
     *   |value-of<UpdateStorePromoRuleEcommerceRequestStartsAtOne>
     * )|null,
     *   target?: ?value-of<UpdateStorePromoRuleEcommerceRequestTarget>,
     *   title?: ?string,
     *   type?: ?value-of<UpdateStorePromoRuleEcommerceRequestType>,
     *   updatedAtForeign?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
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
}
