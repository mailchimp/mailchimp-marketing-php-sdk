<?php

namespace Mailchimp\Ecommerce\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Union;
use DateTime;
use Mailchimp\Ecommerce\Types\CreateStorePromoRuleEcommerceRequestEndsAtOne;
use Mailchimp\Ecommerce\Types\CreateStorePromoRuleEcommerceRequestStartsAtOne;
use Mailchimp\Ecommerce\Types\CreateStorePromoRuleEcommerceRequestTarget;
use Mailchimp\Ecommerce\Types\CreateStorePromoRuleEcommerceRequestType;

class CreateStorePromoRuleEcommerceRequest extends JsonSerializableType
{
    /**
     * @var (
     *    float
     *   |string
     * ) $amount
     */
    #[JsonProperty('amount'), Union('float', 'string')]
    public float|string $amount;

    /**
     * @var ?string $createdAtForeign The date and time the promotion was created in ISO 8601 format.
     */
    #[JsonProperty('created_at_foreign')]
    public ?string $createdAtForeign;

    /**
     * @var string $description The description of a promotion restricted to UTF-8 characters with max length 255.
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var ?bool $enabled Whether the promo rule is currently enabled.
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var (
     *    DateTime
     *   |string
     *   |value-of<CreateStorePromoRuleEcommerceRequestEndsAtOne>
     * )|null $endsAt
     */
    #[JsonProperty('ends_at'), Union('datetime', 'date', 'string', 'null')]
    public DateTime|string|null $endsAt;

    /**
     * @var string $id A unique identifier for the promo rule. If Ecommerce platform does not support promo rule, use promo code id as promo rule id. Restricted to UTF-8 characters with max length 50.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var (
     *    DateTime
     *   |string
     *   |value-of<CreateStorePromoRuleEcommerceRequestStartsAtOne>
     * )|null $startsAt
     */
    #[JsonProperty('starts_at'), Union('datetime', 'date', 'string', 'null')]
    public DateTime|string|null $startsAt;

    /**
     * @var value-of<CreateStorePromoRuleEcommerceRequestTarget> $target The target that the discount applies to.
     */
    #[JsonProperty('target')]
    public string $target;

    /**
     * @var ?string $title The title that will show up in promotion campaign. Restricted to UTF-8 characters with max length of 100 bytes.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var value-of<CreateStorePromoRuleEcommerceRequestType> $type Type of discount. For free shipping set type to fixed.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?string $updatedAtForeign The date and time the promotion was updated in ISO 8601 format.
     */
    #[JsonProperty('updated_at_foreign')]
    public ?string $updatedAtForeign;

    /**
     * @param array{
     *   amount: (
     *    float
     *   |string
     * ),
     *   description: string,
     *   id: string,
     *   target: value-of<CreateStorePromoRuleEcommerceRequestTarget>,
     *   type: value-of<CreateStorePromoRuleEcommerceRequestType>,
     *   createdAtForeign?: ?string,
     *   enabled?: ?bool,
     *   endsAt?: (
     *    DateTime
     *   |string
     *   |value-of<CreateStorePromoRuleEcommerceRequestEndsAtOne>
     * )|null,
     *   startsAt?: (
     *    DateTime
     *   |string
     *   |value-of<CreateStorePromoRuleEcommerceRequestStartsAtOne>
     * )|null,
     *   title?: ?string,
     *   updatedAtForeign?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->amount = $values['amount'];
        $this->createdAtForeign = $values['createdAtForeign'] ?? null;
        $this->description = $values['description'];
        $this->enabled = $values['enabled'] ?? null;
        $this->endsAt = $values['endsAt'] ?? null;
        $this->id = $values['id'];
        $this->startsAt = $values['startsAt'] ?? null;
        $this->target = $values['target'];
        $this->title = $values['title'] ?? null;
        $this->type = $values['type'];
        $this->updatedAtForeign = $values['updatedAtForeign'] ?? null;
    }
}
