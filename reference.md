# Reference
## root
<details><summary><code>$client-&gt;root-&gt;list($request) -> ?ListRootResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get links to all other resources available in the API.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->root->list(
    new ListRootRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## AccountExports
<details><summary><code>$client-&gt;accountExports-&gt;list($request) -> ?ListAccountExportsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a list of account exports for a given account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->accountExports->list(
    new ListAccountExportsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;accountExports-&gt;create($request) -> ?CreateAccountExportsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new account export in your Mailchimp account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->accountExports->create(
    new CreateAccountExportsRequest([
        'includeStages' => [
            CreateAccountExportsRequestIncludeStagesItem::Audiences->value,
            CreateAccountExportsRequestIncludeStagesItem::GalleryFiles->value,
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$includeStages:** `array` — The stages of an account export to include.
    
</dd>
</dl>

<dl>
<dd>

**$sinceTimestamp:** `?DateTime` — An ISO 8601 date that will limit the export to only records created after a given time. For instance, the reports stage will contain any campaign sent after the given timestamp. Audiences, however, are excluded from this limit.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;accountExports-&gt;get($exportId, $request) -> ?GetAccountExportsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific account export.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->accountExports->get(
    'export_id',
    new GetAccountExportsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$exportId:** `string` — The unique id for the account export.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## ActivityFeed
<details><summary><code>$client-&gt;activityFeed-&gt;list() -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about the activity feed endpoint's resources.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->activityFeed->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;activityFeed-&gt;listChimpChatter($request) -> ?ListChimpChatterActivityFeedResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Return the Chimp Chatter for this account ordered by most recent.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->activityFeed->listChimpChatter(
    new ListChimpChatterActivityFeedRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## AuthorizedApps
<details><summary><code>$client-&gt;authorizedApps-&gt;list($request) -> ?ListAuthorizedAppsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a list of an account's registered, connected applications.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->authorizedApps->list(
    new ListAuthorizedAppsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;authorizedApps-&gt;get($appId, $request) -> ?GetAuthorizedAppsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific authorized application.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->authorizedApps->get(
    'app_id',
    new GetAuthorizedAppsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$appId:** `string` — The unique id for the connected authorized application.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## automations
<details><summary><code>$client-&gt;automations-&gt;list($request) -> ?ListAutomationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a summary of an account's classic automations.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->automations->list(
    new ListAutomationsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$beforeCreateTime:** `?DateTime` — Restrict the response to automations created before this time. Uses the ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$sinceCreateTime:** `?DateTime` — Restrict the response to automations created after this time. Uses the ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$beforeStartTime:** `?DateTime` — Restrict the response to automations started before this time. Uses the ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$sinceStartTime:** `?DateTime` — Restrict the response to automations started after this time. Uses the ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Restrict the results to automations with the specified status.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;automations-&gt;create($request) -> ?AutomationWorkflow</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new classic automation in your Mailchimp account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->automations->create(
    new CreateAutomationsRequest([
        'recipients' => new CreateAutomationsRequestRecipients([]),
        'triggerSettings' => new CreateAutomationsRequestTriggerSettings([
            'workflowType' => CreateAutomationsRequestTriggerSettingsWorkflowType::AbandonedBrowse->value,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$recipients:** `CreateAutomationsRequestRecipients` — List settings for the Automation.
    
</dd>
</dl>

<dl>
<dd>

**$settings:** `?CreateAutomationsRequestSettings` — The settings for the Automation workflow.
    
</dd>
</dl>

<dl>
<dd>

**$triggerSettings:** `CreateAutomationsRequestTriggerSettings` — Trigger settings for the Automation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;automations-&gt;get($workflowId, $request) -> ?AutomationWorkflow</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a summary of an individual classic automation workflow's settings and content. The `trigger_settings` object returns information for the first email in the workflow.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->automations->get(
    'workflow_id',
    new GetAutomationsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$workflowId:** `string` — The unique id for the Automation workflow.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;automations-&gt;createActionArchive($workflowId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Archiving will permanently end your automation and keep the report data. You’ll be able to replicate your archived automation, but you can’t restart it.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->automations->createActionArchive(
    'workflow_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$workflowId:** `string` — The unique id for the Automation workflow.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;automations-&gt;createActionPauseAllEmail($workflowId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Pause all emails in a specific classic automation workflow.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->automations->createActionPauseAllEmail(
    'workflow_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$workflowId:** `string` — The unique id for the Automation workflow.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;automations-&gt;createActionStartAllEmail($workflowId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Start all emails in a classic automation workflow.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->automations->createActionStartAllEmail(
    'workflow_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$workflowId:** `string` — The unique id for the Automation workflow.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;automations-&gt;listEmails($workflowId) -> ?ListEmailsAutomationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a summary of the emails in a classic automation workflow.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->automations->listEmails(
    'workflow_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$workflowId:** `string` — The unique id for the Automation workflow.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;automations-&gt;getEmail($workflowId, $workflowEmailId) -> ?AutomationWorkflowEmail</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about an individual classic automation workflow email.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->automations->getEmail(
    'workflow_id',
    'workflow_email_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$workflowId:** `string` — The unique id for the Automation workflow.
    
</dd>
</dl>

<dl>
<dd>

**$workflowEmailId:** `string` — The unique id for the Automation workflow email.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;automations-&gt;deleteEmail($workflowId, $workflowEmailId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Removes an individual classic automation workflow email. Emails from certain workflow types, including the Abandoned Cart Email (abandonedCart) and Product Retargeting Email (abandonedBrowse) Workflows, cannot be deleted.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->automations->deleteEmail(
    'workflow_id',
    'workflow_email_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$workflowId:** `string` — The unique id for the Automation workflow.
    
</dd>
</dl>

<dl>
<dd>

**$workflowEmailId:** `string` — The unique id for the Automation workflow email.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;automations-&gt;updateEmail($workflowId, $workflowEmailId, $request) -> ?AutomationWorkflowEmail</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update settings for a classic automation workflow email.  Only works with workflows of type: abandonedBrowse, abandonedCart, emailFollowup, or singleWelcome.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->automations->updateEmail(
    'workflow_id',
    'workflow_email_id',
    new UpdateEmailAutomationsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$workflowId:** `string` — The unique id for the Automation workflow.
    
</dd>
</dl>

<dl>
<dd>

**$workflowEmailId:** `string` — The unique id for the Automation workflow email.
    
</dd>
</dl>

<dl>
<dd>

**$delay:** `?UpdateEmailAutomationsRequestDelay` — The delay settings for an automation email.
    
</dd>
</dl>

<dl>
<dd>

**$settings:** `?UpdateEmailAutomationsRequestSettings` — Settings for the campaign including the email subject, from name, and from email address.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;automations-&gt;createEmailActionPause($workflowId, $workflowEmailId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Pause an automated email.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->automations->createEmailActionPause(
    'workflow_id',
    'workflow_email_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$workflowId:** `string` — The unique id for the Automation workflow.
    
</dd>
</dl>

<dl>
<dd>

**$workflowEmailId:** `string` — The unique id for the Automation workflow email.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;automations-&gt;createEmailActionStart($workflowId, $workflowEmailId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Start an automated email.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->automations->createEmailActionStart(
    'workflow_id',
    'workflow_email_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$workflowId:** `string` — The unique id for the Automation workflow.
    
</dd>
</dl>

<dl>
<dd>

**$workflowEmailId:** `string` — The unique id for the Automation workflow email.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;automations-&gt;listEmailQueue($workflowId, $workflowEmailId) -> ?ListEmailQueueAutomationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a classic automation email queue.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->automations->listEmailQueue(
    'workflow_id',
    'workflow_email_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$workflowId:** `string` — The unique id for the Automation workflow.
    
</dd>
</dl>

<dl>
<dd>

**$workflowEmailId:** `string` — The unique id for the Automation workflow email.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;automations-&gt;createEmailQueue($workflowId, $workflowEmailId, $request) -> ?SubscriberInAutomationQueue</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Manually add a subscriber to a workflow, bypassing the default trigger settings. You can also use this endpoint to trigger a series of automated emails in an API 3.0 workflow type.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->automations->createEmailQueue(
    'workflow_id',
    'workflow_email_id',
    new CreateEmailQueueAutomationsRequest([
        'emailAddress' => 'email_address',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$workflowId:** `string` — The unique id for the Automation workflow.
    
</dd>
</dl>

<dl>
<dd>

**$workflowEmailId:** `string` — The unique id for the Automation workflow email.
    
</dd>
</dl>

<dl>
<dd>

**$emailAddress:** `string` — The list member's email address.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;automations-&gt;getEmailQueue($workflowId, $workflowEmailId, $subscriberHash) -> ?SubscriberInAutomationQueue</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific subscriber in a classic automation email queue.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->automations->getEmailQueue(
    'workflow_id',
    'workflow_email_id',
    'subscriber_hash',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$workflowId:** `string` — The unique id for the Automation workflow.
    
</dd>
</dl>

<dl>
<dd>

**$workflowEmailId:** `string` — The unique id for the Automation workflow email.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;automations-&gt;listRemovedSubscribers($workflowId) -> ?ListRemovedSubscribersAutomationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about subscribers who were removed from a classic automation workflow.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->automations->listRemovedSubscribers(
    'workflow_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$workflowId:** `string` — The unique id for the Automation workflow.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;automations-&gt;createRemovedSubscriber($workflowId, $request) -> ?SubscriberRemovedFromAutomationWorkflow</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Remove a subscriber from a specific classic automation workflow. You can remove a subscriber at any point in an automation workflow, regardless of how many emails they've been sent from that workflow. Once they're removed, they can never be added back to the same workflow.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->automations->createRemovedSubscriber(
    'workflow_id',
    new CreateRemovedSubscriberAutomationsRequest([
        'emailAddress' => 'email_address',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$workflowId:** `string` — The unique id for the Automation workflow.
    
</dd>
</dl>

<dl>
<dd>

**$emailAddress:** `string` — The list member's email address.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;automations-&gt;getRemovedSubscriber($workflowId, $subscriberHash) -> ?SubscriberRemovedFromAutomationWorkflow</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific subscriber who was removed from a classic automation workflow.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->automations->getRemovedSubscriber(
    'workflow_id',
    'subscriber_hash',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$workflowId:** `string` — The unique id for the Automation workflow.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## BatchWebhooks
<details><summary><code>$client-&gt;batchWebhooks-&gt;list($request) -> ?ListBatchWebhooksResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get all webhooks that have been configured for batches.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->batchWebhooks->list(
    new ListBatchWebhooksRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;batchWebhooks-&gt;create($request) -> ?BatchWebhook</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Configure a webhook that will fire whenever any batch request completes processing.  You may only have a maximum of 20 batch webhooks.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->batchWebhooks->create(
    new CreateBatchWebhooksRequest([
        'url' => 'http://yourdomain.com/webhook',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$enabled:** `?bool` — Whether the webhook receives requests or not.
    
</dd>
</dl>

<dl>
<dd>

**$url:** `string` — A valid URL for the Webhook.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;batchWebhooks-&gt;get($batchWebhookId, $request) -> ?BatchWebhook</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific batch webhook.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->batchWebhooks->get(
    'batch_webhook_id',
    new GetBatchWebhooksRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$batchWebhookId:** `string` — The unique id for the batch webhook.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;batchWebhooks-&gt;delete($batchWebhookId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Remove a batch webhook. Webhooks will no longer be sent to the given URL.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->batchWebhooks->delete(
    'batch_webhook_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$batchWebhookId:** `string` — The unique id for the batch webhook.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;batchWebhooks-&gt;update($batchWebhookId, $request) -> ?BatchWebhook</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a webhook that will fire whenever any batch request completes processing.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->batchWebhooks->update(
    'batch_webhook_id',
    new UpdateBatchWebhooksRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$batchWebhookId:** `string` — The unique id for the batch webhook.
    
</dd>
</dl>

<dl>
<dd>

**$enabled:** `?bool` — Whether the webhook receives requests or not.
    
</dd>
</dl>

<dl>
<dd>

**$url:** `?string` — A valid URL for the Webhook.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## batches
<details><summary><code>$client-&gt;batches-&gt;list($request) -> ?ListBatchesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a summary of batch requests that have been made.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->batches->list(
    new ListBatchesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;batches-&gt;create($request) -> ?Batch</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Begin processing a batch operations request.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->batches->create(
    new CreateBatchesRequest([
        'operations' => [
            new CreateBatchesRequestOperationsItem([
                'method' => CreateBatchesRequestOperationsItemMethod::Get->value,
                'path' => '/lists',
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$operations:** `array` — An array of objects that describes operations to perform.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;batches-&gt;get($batchId, $request) -> ?Batch</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get the status of a batch request.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->batches->get(
    'batch_id',
    new GetBatchesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$batchId:** `string` — The unique id for the batch operation.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;batches-&gt;delete($batchId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Stops a batch request from running. Since only one batch request is run at a time, this can be used to cancel a long running request. The results of any completed operations will not be available after this call.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->batches->delete(
    'batch_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$batchId:** `string` — The unique id for the batch operation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## CampaignFolders
<details><summary><code>$client-&gt;campaignFolders-&gt;list($request) -> ?CampaignFolders</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get all folders used to organize campaigns.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaignFolders->list(
    new ListCampaignFoldersRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaignFolders-&gt;create($request) -> ?CampaignFolders</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new campaign folder.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaignFolders->create(
    new CreateCampaignFoldersRequest([
        'name' => 'name',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `string` — Name to associate with the folder.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaignFolders-&gt;get($folderId, $request) -> ?GetCampaignFoldersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific folder used to organize campaigns.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaignFolders->get(
    'folder_id',
    new GetCampaignFoldersRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$folderId:** `string` — The unique id for the campaign folder.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaignFolders-&gt;delete($folderId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a specific campaign folder, and mark all the campaigns in the folder as 'unfiled'.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaignFolders->delete(
    'folder_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$folderId:** `string` — The unique id for the campaign folder.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaignFolders-&gt;update($folderId, $request) -> ?UpdateCampaignFoldersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a specific folder used to organize campaigns.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaignFolders->update(
    'folder_id',
    new UpdateCampaignFoldersRequest([
        'name' => 'name',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$folderId:** `string` — The unique id for the campaign folder.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — Name to associate with the folder.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## campaigns
<details><summary><code>$client-&gt;campaigns-&gt;list($request) -> ?ListCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get all campaigns in an account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->list(
    new ListCampaignsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — The campaign type.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — The status of the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$beforeSendTime:** `?DateTime` — Restrict the response to campaigns sent before the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$sinceSendTime:** `?DateTime` — Restrict the response to campaigns sent after the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$beforeCreateTime:** `?DateTime` — Restrict the response to campaigns created before the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$sinceCreateTime:** `?DateTime` — Restrict the response to campaigns created after the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$listId:** `?string` — The unique id for the list.
    
</dd>
</dl>

<dl>
<dd>

**$folderId:** `?string` — The unique folder id.
    
</dd>
</dl>

<dl>
<dd>

**$memberId:** `?string` — Retrieve campaigns sent to a particular list member. Member ID is The MD5 hash of the lowercase version of the list member’s email address.
    
</dd>
</dl>

<dl>
<dd>

**$sortField:** `?string` — Returns files sorted by the specified field.
    
</dd>
</dl>

<dl>
<dd>

**$sortDir:** `?string` — Determines the order direction for sorted results.
    
</dd>
</dl>

<dl>
<dd>

**$includeResendShortcutEligibility:** `?bool` — Return the `resend_shortcut_eligibility` field in the response, which tells you if the campaign is eligible for the various Campaign Resend Shortcuts offered.
    
</dd>
</dl>

<dl>
<dd>

**$includeResendShortcutUsage:** `?bool` — Return the `resend_shortcut_usage` field in the response.  This includes information about campaigns related by a shortcut.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;create($request) -> ?Campaign</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new Mailchimp campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->create(
    new CreateCampaignsRequest([
        'type' => CreateCampaignsRequestType::Regular->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contentType:** `?string` — How the campaign's content is put together. The old drag and drop editor uses 'template' while the new editor uses 'multichannel'. Defaults to template.
    
</dd>
</dl>

<dl>
<dd>

**$recipients:** `?CreateCampaignsRequestRecipients` — List settings for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$rssOpts:** `?CreateCampaignsRequestRssOpts` — [RSS](https://mailchimp.com/help/share-your-blog-posts-with-mailchimp/) options, specific to an RSS campaign.
    
</dd>
</dl>

<dl>
<dd>

**$settings:** `?CreateCampaignsRequestSettings` — The settings for your campaign, including subject, from name, reply-to address, and more.
    
</dd>
</dl>

<dl>
<dd>

**$socialCard:** `?CreateCampaignsRequestSocialCard` — The preview for the campaign, rendered by social networks like Facebook and Twitter. [Learn more](https://mailchimp.com/help/enable-and-customize-social-cards/).
    
</dd>
</dl>

<dl>
<dd>

**$tracking:** `?CampaignTrackingOptions` 
    
</dd>
</dl>

<dl>
<dd>

**$type:** `string` — There are four types of [campaigns](https://mailchimp.com/help/getting-started-with-campaigns/) you can create in Mailchimp. A/B Split campaigns have been deprecated and variate campaigns should be used instead.
    
</dd>
</dl>

<dl>
<dd>

**$variateSettings:** `?CreateCampaignsRequestVariateSettings` — The settings specific to A/B test campaigns.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;get($campaignId, $request) -> ?Campaign</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->get(
    'campaign_id',
    new GetCampaignsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$includeResendShortcutEligibility:** `?bool` — Return the `resend_shortcut_eligibility` field in the response, which tells you if the campaign is eligible for the various Campaign Resend Shortcuts offered.
    
</dd>
</dl>

<dl>
<dd>

**$includeResendShortcutUsage:** `?bool` — Return the `resend_shortcut_usage` field in the response.  This includes information about campaigns related by a shortcut.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;delete($campaignId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Remove a campaign from your Mailchimp account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->delete(
    'campaign_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;update($campaignId, $request) -> ?Campaign</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update some or all of the settings for a specific campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->update(
    'campaign_id',
    new UpdateCampaignsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$recipients:** `?UpdateCampaignsRequestRecipients` — List settings for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$rssOpts:** `?UpdateCampaignsRequestRssOpts` — [RSS](https://mailchimp.com/help/share-your-blog-posts-with-mailchimp/) options for a campaign.
    
</dd>
</dl>

<dl>
<dd>

**$settings:** `?UpdateCampaignsRequestSettings` — The settings for your campaign, including subject, from name, reply-to address, and more.
    
</dd>
</dl>

<dl>
<dd>

**$socialCard:** `?UpdateCampaignsRequestSocialCard` — The preview for the campaign, rendered by social networks like Facebook and Twitter. [Learn more](https://mailchimp.com/help/enable-and-customize-social-cards/).
    
</dd>
</dl>

<dl>
<dd>

**$tracking:** `?CampaignTrackingOptions` 
    
</dd>
</dl>

<dl>
<dd>

**$variateSettings:** `?UpdateCampaignsRequestVariateSettings` — The settings specific to A/B test campaigns.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;createActionCancelSend($campaignId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Cancel a Regular or Plain-Text Campaign after you send, before all of your recipients receive it. This feature is included with Mailchimp Pro.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->createActionCancelSend(
    'campaign_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;createActionCreateResend($campaignId, $request) -> ?Campaign</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Remove the guesswork for resending a campaign to certain segments. You can use this endpoint as a shortcut to replicate a campaign and resend it to common segments, such as those who didn't open the campaign, or any new subscribers since it was sent.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->createActionCreateResend(
    'campaign_id',
    new CreateActionCreateResendCampaignsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$shortcutType:** `?string` — Which campaign resend shortcut to use. Default is `to_non_openers`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;createActionPause($campaignId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Pause an RSS-Driven campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->createActionPause(
    'campaign_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;createActionReplicate($campaignId) -> ?Campaign</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Replicate a campaign in saved or send status.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->createActionReplicate(
    'campaign_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;createActionResume($campaignId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Resume an RSS-Driven campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->createActionResume(
    'campaign_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;createActionSchedule($campaignId, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Schedule a campaign for delivery. If you're using Multivariate Campaigns to test send times or sending RSS Campaigns, use the send action instead.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->createActionSchedule(
    'campaign_id',
    new CreateActionScheduleCampaignsRequest([
        'scheduleTime' => new DateTime('2024-01-15T09:30:00Z'),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$batchDelivery:** `?CreateActionScheduleCampaignsRequestBatchDelivery` — Choose whether the campaign should use [Batch Delivery](https://mailchimp.com/help/schedule-batch-delivery/). Cannot be set to `true` for campaigns using [Timewarp](https://mailchimp.com/help/use-timewarp/).
    
</dd>
</dl>

<dl>
<dd>

**$scheduleTime:** `DateTime` — The UTC date and time to schedule the campaign for delivery in ISO 8601 format. Campaigns may only be scheduled to send on the quarter-hour (:00, :15, :30, :45).
    
</dd>
</dl>

<dl>
<dd>

**$timewarp:** `?bool` — Choose whether the campaign should use [Timewarp](https://mailchimp.com/help/use-timewarp/) when sending. Campaigns scheduled with Timewarp are localized based on the recipients' time zones. For example, a Timewarp campaign with a `schedule_time` of 13:00 will be sent to each recipient at 1:00pm in their local time. Cannot be set to `true` for campaigns using [Batch Delivery](https://mailchimp.com/help/schedule-batch-delivery/).
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;createActionSend($campaignId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Send a Mailchimp campaign. For RSS Campaigns, the campaign will send according to its schedule. All other campaigns will send immediately.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->createActionSend(
    'campaign_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;createActionTest($campaignId, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Send a test email.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->createActionTest(
    'campaign_id',
    new CreateActionTestCampaignsRequest([
        'sendType' => CreateActionTestCampaignsRequestSendType::Html->value,
        'testEmails' => [
            'test_emails',
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$sendType:** `string` — Choose the type of test email to send.
    
</dd>
</dl>

<dl>
<dd>

**$testEmails:** `array` — An array of email addresses to send the test email to.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;createActionUnschedule($campaignId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Unschedule a scheduled campaign that hasn't started sending.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->createActionUnschedule(
    'campaign_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;getContent($campaignId, $request) -> ?CampaignContent</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get the the HTML and plain-text content for a campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->getContent(
    'campaign_id',
    new GetContentCampaignsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;upsertContent($campaignId, $request) -> ?CampaignContent</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Set the content for a campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->upsertContent(
    'campaign_id',
    new UpsertContentCampaignsRequest([
        'body' => new CampaignContent([]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$request:** `CampaignContent` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;listFeedback($campaignId, $request) -> ?ListFeedbackCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get team feedback while you're working together on a Mailchimp campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->listFeedback(
    'campaign_id',
    new ListFeedbackCampaignsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;createFeedback($campaignId, $request) -> ?CreateFeedbackCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add feedback on a specific campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->createFeedback(
    'campaign_id',
    new CreateFeedbackCampaignsRequest([
        'message' => 'message',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$blockId:** `?int` — The block id for the editable block that the feedback addresses.
    
</dd>
</dl>

<dl>
<dd>

**$isComplete:** `?bool` — The status of feedback.
    
</dd>
</dl>

<dl>
<dd>

**$message:** `string` — The content of the feedback.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;getFeedback($campaignId, $feedbackId, $request) -> ?CampaignFeedback</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a specific feedback message from a campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->getFeedback(
    'campaign_id',
    'feedback_id',
    new GetFeedbackCampaignsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$feedbackId:** `string` — The unique id for the feedback message.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;deleteFeedback($campaignId, $feedbackId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Remove a specific feedback message for a campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->deleteFeedback(
    'campaign_id',
    'feedback_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$feedbackId:** `string` — The unique id for the feedback message.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;updateFeedback($campaignId, $feedbackId, $request) -> ?CampaignFeedback</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a specific feedback message for a campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->updateFeedback(
    'campaign_id',
    'feedback_id',
    new UpdateFeedbackCampaignsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$feedbackId:** `string` — The unique id for the feedback message.
    
</dd>
</dl>

<dl>
<dd>

**$blockId:** `?int` — The block id for the editable block that the feedback addresses.
    
</dd>
</dl>

<dl>
<dd>

**$isComplete:** `?bool` — The status of feedback.
    
</dd>
</dl>

<dl>
<dd>

**$message:** `?string` — The content of the feedback.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;listSendChecklist($campaignId, $request) -> ?ListSendChecklistCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Review the send checklist for a campaign, and resolve any issues before sending.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->listSendChecklist(
    'campaign_id',
    new ListSendChecklistCampaignsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## ConnectedSites
<details><summary><code>$client-&gt;connectedSites-&gt;list($request) -> ?ListConnectedSitesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get all connected sites in an account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->connectedSites->list(
    new ListConnectedSitesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;connectedSites-&gt;create($request) -> ?ConnectedSite</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new Mailchimp connected site.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->connectedSites->create(
    new CreateConnectedSitesRequest([
        'domain' => 'example.com',
        'foreignId' => 'MC001',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$domain:** `string` — The connected site domain.
    
</dd>
</dl>

<dl>
<dd>

**$foreignId:** `string` — The unique identifier for the site.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;connectedSites-&gt;get($connectedSiteId, $request) -> ?ConnectedSite</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific connected site.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->connectedSites->get(
    'connected_site_id',
    new GetConnectedSitesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$connectedSiteId:** `string` — The unique identifier for the site.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;connectedSites-&gt;delete($connectedSiteId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Remove a connected site from your Mailchimp account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->connectedSites->delete(
    'connected_site_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$connectedSiteId:** `string` — The unique identifier for the site.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;connectedSites-&gt;createActionVerifyScriptInstallation($connectedSiteId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Verify that the connected sites script has been installed, either via the script URL or fragment.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->connectedSites->createActionVerifyScriptInstallation(
    'connected_site_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$connectedSiteId:** `string` — The unique identifier for the site.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## conversations
<details><summary><code>$client-&gt;conversations-&gt;list($request) -> ?ListConversationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a list of conversations for the account. Conversations has been deprecated in favor of Inbox and these endpoints don't include Inbox data. Past Conversations are still available via this endpoint, but new campaign replies and other Inbox messages aren’t available using this endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->list(
    new ListConversationsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$hasUnreadMessages:** `?string` — Whether the conversation has any unread messages.
    
</dd>
</dl>

<dl>
<dd>

**$listId:** `?string` — The unique id for the list.
    
</dd>
</dl>

<dl>
<dd>

**$campaignId:** `?string` — The unique id for the campaign.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;conversations-&gt;get($conversationId, $request) -> ?Conversation</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get details about an individual conversation. Conversations has been deprecated in favor of Inbox and these endpoints don't include Inbox data. Past Conversations are still available via this endpoint, but new campaign replies and other Inbox messages aren’t available using this endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->get(
    'conversation_id',
    new GetConversationsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$conversationId:** `string` — The unique id for the conversation.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;conversations-&gt;listMessages($conversationId, $request) -> ?ListMessagesConversationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get messages from a specific conversation. Conversations has been deprecated in favor of Inbox and these endpoints don't include Inbox data. Past Conversations are still available via this endpoint, but new campaign replies and other Inbox messages aren’t available using this endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->listMessages(
    'conversation_id',
    new ListMessagesConversationsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$conversationId:** `string` — The unique id for the conversation.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$isRead:** `?string` — Whether a conversation message has been marked as read.
    
</dd>
</dl>

<dl>
<dd>

**$beforeTimestamp:** `?DateTime` — Restrict the response to messages created before the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$sinceTimestamp:** `?DateTime` — Restrict the response to messages created after the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;conversations-&gt;getMessage($conversationId, $messageId, $request) -> ?ConversationMessage</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get an individual message in a conversation. Conversations has been deprecated in favor of Inbox and these endpoints don't include Inbox data. Past Conversations are still available via this endpoint, but new campaign replies and other Inbox messages aren’t available using this endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->getMessage(
    'conversation_id',
    'message_id',
    new GetMessageConversationsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$conversationId:** `string` — The unique id for the conversation.
    
</dd>
</dl>

<dl>
<dd>

**$messageId:** `string` — The unique id for the conversation message.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## CustomerJourneys
<details><summary><code>$client-&gt;customerJourneys-&gt;createJourneyStepActionTrigger($journeyId, $stepId, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

A step trigger in an Automation flow. To use it, create a starting point or step from the Automation flow builder in the app using the Customer Journeys API condition. We’ll provide a url during the process that includes the {journey_id} and {step_id}. You’ll then be able to use this endpoint to trigger the condition for the posted contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customerJourneys->createJourneyStepActionTrigger(
    1,
    1,
    new CreateJourneyStepActionTriggerCustomerJourneysRequest([
        'emailAddress' => 'email_address',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$journeyId:** `int` — The id for the flow.
    
</dd>
</dl>

<dl>
<dd>

**$stepId:** `int` — The id for the Step.
    
</dd>
</dl>

<dl>
<dd>

**$emailAddress:** `string` — The list member's email address.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## ecommerce
<details><summary><code>$client-&gt;ecommerce-&gt;list() -> ?ListEcommerceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about the e-commerce endpoint's resources.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;listOrders($request) -> ?ListOrdersEcommerceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about an account's orders.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->listOrders(
    new ListOrdersEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$campaignId:** `?string` — Restrict results to orders with a specific `campaign_id` value.
    
</dd>
</dl>

<dl>
<dd>

**$outreachId:** `?string` — Restrict results to orders with a specific `outreach_id` value.
    
</dd>
</dl>

<dl>
<dd>

**$customerId:** `?string` — Restrict results to orders made by a specific customer.
    
</dd>
</dl>

<dl>
<dd>

**$hasOutreach:** `?bool` — Restrict results to orders that have an outreach attached. For example, an email campaign or Facebook ad.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;listStores($request) -> ?ListStoresEcommerceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about all stores in the account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->listStores(
    new ListStoresEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;createStore($request) -> ?ECommerceStore</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add a new store to your Mailchimp account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->createStore(
    new CreateStoreEcommerceRequest([
        'currencyCode' => 'USD',
        'id' => 'example_store',
        'listId' => '1a2df69511',
        'name' => "Freddie's Cat Hat Emporium",
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$address:** `?CreateStoreEcommerceRequestAddress` — The store address.
    
</dd>
</dl>

<dl>
<dd>

**$currencyCode:** `string` — The three-letter ISO 4217 code for the currency that the store accepts.
    
</dd>
</dl>

<dl>
<dd>

**$domain:** `?string` — The store domain. This parameter is required for Connected Sites and Google Ads.
    
</dd>
</dl>

<dl>
<dd>

**$emailAddress:** `?string` — The email address for the store.
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — The unique identifier for the store.
    
</dd>
</dl>

<dl>
<dd>

**$isSyncing:** `?bool` — Whether to disable automations because the store is currently [syncing](https://mailchimp.com/developer/marketing/docs/e-commerce/#pausing-store-automations).
    
</dd>
</dl>

<dl>
<dd>

**$listId:** `string` — The unique identifier for the list associated with the store. The `list_id` for a specific store cannot change.
    
</dd>
</dl>

<dl>
<dd>

**$moneyFormat:** `?string` — The currency format for the store. For example: `$`, `£`, etc.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — The name of the store.
    
</dd>
</dl>

<dl>
<dd>

**$phone:** `?string` — The store phone number.
    
</dd>
</dl>

<dl>
<dd>

**$platform:** `?string` — The e-commerce platform of the store.
    
</dd>
</dl>

<dl>
<dd>

**$primaryLocale:** `?string` — The primary locale for the store. For example: `en`, `de`, etc.
    
</dd>
</dl>

<dl>
<dd>

**$timezone:** `?string` — The timezone for the store.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;getStore($storeId, $request) -> ?ECommerceStore</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific store.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->getStore(
    'store_id',
    new GetStoreEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;deleteStore($storeId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a store. Deleting a store will also delete any associated subresources, including Customers, Orders, Products, and Carts.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->deleteStore(
    'store_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;updateStore($storeId, $request) -> ?ECommerceStore</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a store.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->updateStore(
    'store_id',
    new UpdateStoreEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$address:** `?UpdateStoreEcommerceRequestAddress` — The store address.
    
</dd>
</dl>

<dl>
<dd>

**$currencyCode:** `?string` — The three-letter ISO 4217 code for the currency that the store accepts.
    
</dd>
</dl>

<dl>
<dd>

**$domain:** `?string` — The store domain.
    
</dd>
</dl>

<dl>
<dd>

**$emailAddress:** `?string` — The email address for the store.
    
</dd>
</dl>

<dl>
<dd>

**$isSyncing:** `?bool` — Whether to disable automations because the store is currently [syncing](https://mailchimp.com/developer/marketing/docs/e-commerce/#pausing-store-automations).
    
</dd>
</dl>

<dl>
<dd>

**$moneyFormat:** `?string` — The currency format for the store. For example: `$`, `£`, etc.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — The name of the store.
    
</dd>
</dl>

<dl>
<dd>

**$phone:** `?string` — The store phone number.
    
</dd>
</dl>

<dl>
<dd>

**$platform:** `?string` — The e-commerce platform of the store.
    
</dd>
</dl>

<dl>
<dd>

**$primaryLocale:** `?string` — The primary locale for the store. For example: `en`, `de`, etc.
    
</dd>
</dl>

<dl>
<dd>

**$timezone:** `?string` — The timezone for the store.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;listStoreCarts($storeId, $request) -> ?ListStoreCartsEcommerceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a store's carts.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->listStoreCarts(
    'store_id',
    new ListStoreCartsEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;createStoreCart($storeId, $request) -> ?ECommerceCart</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add a new cart to a store.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->createStoreCart(
    'store_id',
    new CreateStoreCartEcommerceRequest([
        'currencyCode' => 'currency_code',
        'customer' => new EcommerceStoresCartsPost([
            'id' => 'id',
        ]),
        'id' => 'id',
        'lines' => [
            new CreateStoreCartEcommerceRequestLinesItem([
                'id' => 'id',
                'price' => 1.1,
                'productId' => 'product_id',
                'productVariantId' => 'product_variant_id',
                'quantity' => 1,
            ]),
        ],
        'orderTotal' => 1.1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$campaignId:** `?string` — A string that uniquely identifies the campaign for a cart.
    
</dd>
</dl>

<dl>
<dd>

**$checkoutUrl:** `?string` — The URL for the cart. This parameter is required for [Abandoned Cart](https://mailchimp.com/help/create-a-classic-abandoned-cart-email/) automations.
    
</dd>
</dl>

<dl>
<dd>

**$currencyCode:** `string` — The three-letter ISO 4217 code for the currency that the cart uses.
    
</dd>
</dl>

<dl>
<dd>

**$customer:** `EcommerceStoresCartsPost` 
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string|int` — A unique identifier for the cart.
    
</dd>
</dl>

<dl>
<dd>

**$lines:** `array` — An array of the cart's line items.
    
</dd>
</dl>

<dl>
<dd>

**$orderTotal:** `float|string` 
    
</dd>
</dl>

<dl>
<dd>

**$taxTotal:** `float|string|null` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;getStoreCart($storeId, $cartId, $request) -> ?ECommerceCart</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific cart.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->getStoreCart(
    'store_id',
    'cart_id',
    new GetStoreCartEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$cartId:** `string` — The id for the cart.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;deleteStoreCart($storeId, $cartId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a cart.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->deleteStoreCart(
    'store_id',
    'cart_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$cartId:** `string` — The id for the cart.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;updateStoreCart($storeId, $cartId, $request) -> ?ECommerceCart</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a specific cart.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->updateStoreCart(
    'store_id',
    'cart_id',
    new UpdateStoreCartEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$cartId:** `string` — The id for the cart.
    
</dd>
</dl>

<dl>
<dd>

**$campaignId:** `?string` — A string that uniquely identifies the campaign associated with a cart.
    
</dd>
</dl>

<dl>
<dd>

**$checkoutUrl:** `?string` — The URL for the cart. This parameter is required for [Abandoned Cart](https://mailchimp.com/help/create-a-classic-abandoned-cart-email/) automations.
    
</dd>
</dl>

<dl>
<dd>

**$currencyCode:** `?string` — The three-letter ISO 4217 code for the currency that the cart uses.
    
</dd>
</dl>

<dl>
<dd>

**$customer:** `?EcommerceStoresCartsPatch` 
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string|int|null` — A unique identifier for the cart.
    
</dd>
</dl>

<dl>
<dd>

**$lines:** `?array` — An array of the cart's line items.
    
</dd>
</dl>

<dl>
<dd>

**$orderTotal:** `float|string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$taxTotal:** `float|string|null` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;listStoreCartLines($storeId, $cartId, $request) -> ?ListStoreCartLinesEcommerceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a cart's line items.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->listStoreCartLines(
    'store_id',
    'cart_id',
    new ListStoreCartLinesEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$cartId:** `string` — The id for the cart.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;createStoreCartLine($storeId, $cartId, $request) -> ?ECommerceCartLineItem</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add a new line item to an existing cart.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->createStoreCartLine(
    'store_id',
    'cart_id',
    new CreateStoreCartLineEcommerceRequest([
        'id' => 'id',
        'price' => 1.1,
        'productId' => 'product_id',
        'productVariantId' => 'product_variant_id',
        'quantity' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$cartId:** `string` — The id for the cart.
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — A unique identifier for the cart line item.
    
</dd>
</dl>

<dl>
<dd>

**$price:** `float|string` 
    
</dd>
</dl>

<dl>
<dd>

**$productId:** `string` — A unique identifier for the product associated with the cart line item.
    
</dd>
</dl>

<dl>
<dd>

**$productVariantId:** `string` — A unique identifier for the product variant associated with the cart line item.
    
</dd>
</dl>

<dl>
<dd>

**$quantity:** `int` — The quantity of a cart line item.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;getStoreCartLine($storeId, $cartId, $lineId, $request) -> ?ECommerceCartLineItem</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific cart line item.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->getStoreCartLine(
    'store_id',
    'cart_id',
    'line_id',
    new GetStoreCartLineEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$cartId:** `string` — The id for the cart.
    
</dd>
</dl>

<dl>
<dd>

**$lineId:** `string` — The id for the line item of a cart.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;deleteStoreCartLine($storeId, $cartId, $lineId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a specific cart line item.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->deleteStoreCartLine(
    'store_id',
    'cart_id',
    'line_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$cartId:** `string` — The id for the cart.
    
</dd>
</dl>

<dl>
<dd>

**$lineId:** `string` — The id for the line item of a cart.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;updateStoreCartLine($storeId, $cartId, $lineId, $request) -> ?ECommerceCartLineItem</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a specific cart line item.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->updateStoreCartLine(
    'store_id',
    'cart_id',
    'line_id',
    new UpdateStoreCartLineEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$cartId:** `string` — The id for the cart.
    
</dd>
</dl>

<dl>
<dd>

**$lineId:** `string` — The id for the line item of a cart.
    
</dd>
</dl>

<dl>
<dd>

**$price:** `float|string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$productId:** `?string` — A unique identifier for the product associated with the cart line item.
    
</dd>
</dl>

<dl>
<dd>

**$productVariantId:** `?string` — A unique identifier for the product variant associated with the cart line item.
    
</dd>
</dl>

<dl>
<dd>

**$quantity:** `?int` — The quantity of a cart line item.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;listStoreCustomers($storeId, $request) -> ?ListStoreCustomersEcommerceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a store's customers.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->listStoreCustomers(
    'store_id',
    new ListStoreCustomersEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$emailAddress:** `?string` — Restrict the response to customers with the email address.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;createStoreCustomer($storeId, $request) -> ?ECommerceCustomer</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add a new customer to a store.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->createStoreCustomer(
    'store_id',
    new CreateStoreCustomerEcommerceRequest([
        'id' => 'id',
        'optInStatus' => true,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$address:** `?CreateStoreCustomerEcommerceRequestAddress` — The customer's address.
    
</dd>
</dl>

<dl>
<dd>

**$company:** `?string` — The customer's company.
    
</dd>
</dl>

<dl>
<dd>

**$emailAddress:** `?string` — The customer's email address.
    
</dd>
</dl>

<dl>
<dd>

**$firstName:** `?string` — The customer's first name.
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — A unique identifier for the customer. Limited to 50 characters.
    
</dd>
</dl>

<dl>
<dd>

**$lastName:** `?string` — The customer's last name.
    
</dd>
</dl>

<dl>
<dd>

**$optInStatus:** `bool` — The customer's opt-in status. This value will never overwrite the opt-in status of a pre-existing Mailchimp list member, but will apply to list members that are added through the e-commerce API endpoints. Customers who don't opt in to your Mailchimp list [will be added as `Transactional` members](https://mailchimp.com/developer/marketing/docs/e-commerce/#customers).
    
</dd>
</dl>

<dl>
<dd>

**$smsPhoneNumber:** `?string` — A US phone number for SMS contact.
    
</dd>
</dl>

<dl>
<dd>

**$totalSpent:** `float|string|null` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;getStoreCustomer($storeId, $customerId, $request) -> ?ECommerceCustomer</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific customer.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->getStoreCustomer(
    'store_id',
    'customer_id',
    new GetStoreCustomerEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$customerId:** `string` — The id for the customer of a store.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;upsertStoreCustomer($storeId, $customerId, $request) -> ?ECommerceCustomer</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add or update a customer.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->upsertStoreCustomer(
    'store_id',
    'customer_id',
    new UpsertStoreCustomerEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$customerId:** `string` — The id for the customer of a store.
    
</dd>
</dl>

<dl>
<dd>

**$address:** `?UpsertStoreCustomerEcommerceRequestAddress` — The customer's address.
    
</dd>
</dl>

<dl>
<dd>

**$company:** `?string` — The customer's company.
    
</dd>
</dl>

<dl>
<dd>

**$emailAddress:** `?string` — The customer's email address.
    
</dd>
</dl>

<dl>
<dd>

**$firstName:** `?string` — The customer's first name.
    
</dd>
</dl>

<dl>
<dd>

**$id:** `?string` — A unique identifier for the customer. Limited to 50 characters.
    
</dd>
</dl>

<dl>
<dd>

**$lastName:** `?string` — The customer's last name.
    
</dd>
</dl>

<dl>
<dd>

**$optInStatus:** `?bool` — The customer's opt-in status. This value will never overwrite the opt-in status of a pre-existing Mailchimp list member, but will apply to list members that are added through the e-commerce API endpoints. Customers who don't opt in to your Mailchimp list [will be added as `Transactional` members](https://mailchimp.com/developer/marketing/docs/e-commerce/#customers).
    
</dd>
</dl>

<dl>
<dd>

**$smsPhoneNumber:** `?string` — A US phone number for SMS contact.
    
</dd>
</dl>

<dl>
<dd>

**$totalSpent:** `float|string|null` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;deleteStoreCustomer($storeId, $customerId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a customer from a store.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->deleteStoreCustomer(
    'store_id',
    'customer_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$customerId:** `string` — The id for the customer of a store.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;updateStoreCustomer($storeId, $customerId, $request) -> ?ECommerceCustomer</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a customer.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->updateStoreCustomer(
    'store_id',
    'customer_id',
    new UpdateStoreCustomerEcommerceRequest([
        'body' => new EcommerceStoresCartsPatch([]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$customerId:** `string` — The id for the customer of a store.
    
</dd>
</dl>

<dl>
<dd>

**$request:** `EcommerceStoresCartsPatch` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;listStoreOrders($storeId, $request) -> ?ListStoreOrdersEcommerceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a store's orders.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->listStoreOrders(
    'store_id',
    new ListStoreOrdersEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$customerId:** `?string` — Restrict results to orders made by a specific customer.
    
</dd>
</dl>

<dl>
<dd>

**$hasOutreach:** `?bool` — Restrict results to orders that have an outreach attached. For example, an email campaign or Facebook ad.
    
</dd>
</dl>

<dl>
<dd>

**$campaignId:** `?string` — Restrict results to orders with a specific `campaign_id` value.
    
</dd>
</dl>

<dl>
<dd>

**$outreachId:** `?string` — Restrict results to orders with a specific `outreach_id` value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;createStoreOrder($storeId, $request) -> ?ECommerceOrder</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add a new order to a store.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->createStoreOrder(
    'store_id',
    new CreateStoreOrderEcommerceRequest([
        'currencyCode' => 'currency_code',
        'customer' => new EcommerceStoresCartsPost([
            'id' => 'id',
        ]),
        'id' => 'id',
        'lines' => [
            new CreateStoreOrderEcommerceRequestLinesItem([
                'id' => 'id',
                'price' => 1.1,
                'productId' => 'product_id',
                'productVariantId' => 'product_variant_id',
                'quantity' => 1,
            ]),
        ],
        'orderTotal' => 1.1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$billingAddress:** `?CreateStoreOrderEcommerceRequestBillingAddress` — The billing address for the order.
    
</dd>
</dl>

<dl>
<dd>

**$campaignId:** `?string` — A string that uniquely identifies the campaign for an order.
    
</dd>
</dl>

<dl>
<dd>

**$cartId:** `string|int|null` — A cart id that the order was placed for.
    
</dd>
</dl>

<dl>
<dd>

**$cancelledAtForeign:** `?string` — The date and time the order was cancelled in ISO 8601 format. Note: passing a value for this parameter will cancel the order being created.
    
</dd>
</dl>

<dl>
<dd>

**$currencyCode:** `string` — The three-letter ISO 4217 code for the currency that the store accepts.
    
</dd>
</dl>

<dl>
<dd>

**$customer:** `EcommerceStoresCartsPost` 
    
</dd>
</dl>

<dl>
<dd>

**$discountTotal:** `float|string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$financialStatus:** `?string` — The order status. Use this parameter to trigger [Order Notifications](https://mailchimp.com/developer/marketing/docs/e-commerce/#order-notifications).
    
</dd>
</dl>

<dl>
<dd>

**$fulfillmentStatus:** `?string` — The fulfillment status for the order. Use this parameter to trigger [Order Notifications](https://mailchimp.com/developer/marketing/docs/e-commerce/#order-notifications).
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — A unique identifier for the order.
    
</dd>
</dl>

<dl>
<dd>

**$landingSite:** `?string` — The URL for the page where the buyer landed when entering the shop.
    
</dd>
</dl>

<dl>
<dd>

**$lines:** `array` — An array of the order's line items.
    
</dd>
</dl>

<dl>
<dd>

**$orderTotal:** `float|string` 
    
</dd>
</dl>

<dl>
<dd>

**$orderUrl:** `?string` — The URL for the order.
    
</dd>
</dl>

<dl>
<dd>

**$outreach:** `?CreateStoreOrderEcommerceRequestOutreach` — The outreach associated with this order. For example, an email campaign or Facebook ad.
    
</dd>
</dl>

<dl>
<dd>

**$processedAtForeign:** `?string` — The date and time the order was processed in ISO 8601 format.
    
</dd>
</dl>

<dl>
<dd>

**$promos:** `?array` — The promo codes applied on the order
    
</dd>
</dl>

<dl>
<dd>

**$shippingAddress:** `?CreateStoreOrderEcommerceRequestShippingAddress` — The shipping address for the order.
    
</dd>
</dl>

<dl>
<dd>

**$shippingTotal:** `float|string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$taxTotal:** `float|string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$trackingCarrier:** `?string` — The tracking carrier associated with the order.
    
</dd>
</dl>

<dl>
<dd>

**$trackingCode:** `?string` — The Mailchimp tracking code for the order. Uses the 'mc_tc' parameter in E-Commerce tracking URLs.
    
</dd>
</dl>

<dl>
<dd>

**$trackingNumber:** `?string` — The tracking number associated with the order.
    
</dd>
</dl>

<dl>
<dd>

**$trackingUrl:** `?string` — The tracking URL associated with the order.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtForeign:** `?string` — The date and time the order was updated in ISO 8601 format.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;getStoreOrder($storeId, $orderId, $request) -> ?ECommerceOrder</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific order.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->getStoreOrder(
    'store_id',
    'order_id',
    new GetStoreOrderEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$orderId:** `string` — The id for the order in a store.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;deleteStoreOrder($storeId, $orderId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete an order.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->deleteStoreOrder(
    'store_id',
    'order_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$orderId:** `string` — The id for the order in a store.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;updateStoreOrder($storeId, $orderId, $request) -> ?ECommerceOrder</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a specific order.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->updateStoreOrder(
    'store_id',
    'order_id',
    new UpdateStoreOrderEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$orderId:** `string` — The id for the order in a store.
    
</dd>
</dl>

<dl>
<dd>

**$billingAddress:** `?UpdateStoreOrderEcommerceRequestBillingAddress` — The billing address for the order.
    
</dd>
</dl>

<dl>
<dd>

**$campaignId:** `?string` — A string that uniquely identifies the campaign associated with an order.
    
</dd>
</dl>

<dl>
<dd>

**$cartId:** `string|int|null` — A cart id that the order was placed for.
    
</dd>
</dl>

<dl>
<dd>

**$cancelledAtForeign:** `?string` — The date and time the order was cancelled in ISO 8601 format. Note: passing a value for this parameter will cancel the order being edited.
    
</dd>
</dl>

<dl>
<dd>

**$currencyCode:** `?string` — The three-letter ISO 4217 code for the currency that the store accepts.
    
</dd>
</dl>

<dl>
<dd>

**$customer:** `?EcommerceStoresCartsPatch` 
    
</dd>
</dl>

<dl>
<dd>

**$discountTotal:** `float|string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$financialStatus:** `?string` — The order status. Use this parameter to trigger [Order Notifications](https://mailchimp.com/developer/marketing/docs/e-commerce/#order-notifications).
    
</dd>
</dl>

<dl>
<dd>

**$fulfillmentStatus:** `?string` — The fulfillment status for the order. Use this parameter to trigger [Order Notifications](https://mailchimp.com/developer/marketing/docs/e-commerce/#order-notifications).
    
</dd>
</dl>

<dl>
<dd>

**$id:** `?string` — A unique identifier for the order.
    
</dd>
</dl>

<dl>
<dd>

**$landingSite:** `?string` — The URL for the page where the buyer landed when entering the shop.
    
</dd>
</dl>

<dl>
<dd>

**$lines:** `?array` — An array of the order's line items.
    
</dd>
</dl>

<dl>
<dd>

**$orderTotal:** `float|string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$orderUrl:** `?string` — The URL for the order.
    
</dd>
</dl>

<dl>
<dd>

**$outreach:** `?UpdateStoreOrderEcommerceRequestOutreach` — The outreach associated with this order. For example, an email campaign or Facebook ad.
    
</dd>
</dl>

<dl>
<dd>

**$processedAtForeign:** `?string` — The date and time the order was processed in ISO 8601 format.
    
</dd>
</dl>

<dl>
<dd>

**$promos:** `?array` — The promo codes applied on the order. Note: Patch will completely replace the value of promos with the new one provided.
    
</dd>
</dl>

<dl>
<dd>

**$shippingAddress:** `?UpdateStoreOrderEcommerceRequestShippingAddress` — The shipping address for the order.
    
</dd>
</dl>

<dl>
<dd>

**$shippingTotal:** `float|string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$taxTotal:** `float|string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$trackingCarrier:** `?string` — The tracking carrier associated with the order.
    
</dd>
</dl>

<dl>
<dd>

**$trackingCode:** `?string` — The Mailchimp tracking code for the order. Uses the 'mc_tc' parameter in E-Commerce tracking URLs.
    
</dd>
</dl>

<dl>
<dd>

**$trackingNumber:** `?string` — The tracking number associated with the order.
    
</dd>
</dl>

<dl>
<dd>

**$trackingUrl:** `?string` — The tracking URL associated with the order.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtForeign:** `?string` — The date and time the order was updated in ISO 8601 format.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;listStoreOrderLines($storeId, $orderId, $request) -> ?ListStoreOrderLinesEcommerceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about an order's line items.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->listStoreOrderLines(
    'store_id',
    'order_id',
    new ListStoreOrderLinesEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$orderId:** `string` — The id for the order in a store.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;createStoreOrderLine($storeId, $orderId, $request) -> ?ECommerceOrderLineItem</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add a new line item to an existing order.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->createStoreOrderLine(
    'store_id',
    'order_id',
    new CreateStoreOrderLineEcommerceRequest([
        'id' => 'id',
        'price' => 1.1,
        'productId' => 'product_id',
        'productVariantId' => 'product_variant_id',
        'quantity' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$orderId:** `string` — The id for the order in a store.
    
</dd>
</dl>

<dl>
<dd>

**$discount:** `float|string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — A unique identifier for the order line item.
    
</dd>
</dl>

<dl>
<dd>

**$price:** `float|string` 
    
</dd>
</dl>

<dl>
<dd>

**$product:** `?EcommerceStoresOrdersPost` 
    
</dd>
</dl>

<dl>
<dd>

**$productId:** `string` — A unique identifier for the product associated with the order line item.
    
</dd>
</dl>

<dl>
<dd>

**$productVariantId:** `string` — A unique identifier for the product variant associated with the order line item.
    
</dd>
</dl>

<dl>
<dd>

**$quantity:** `int` — The quantity of an order line item.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;getStoreOrderLine($storeId, $orderId, $lineId, $request) -> ?ECommerceOrderLineItem</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific order line item.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->getStoreOrderLine(
    'store_id',
    'order_id',
    'line_id',
    new GetStoreOrderLineEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$orderId:** `string` — The id for the order in a store.
    
</dd>
</dl>

<dl>
<dd>

**$lineId:** `string` — The id for the line item of an order.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;deleteStoreOrderLine($storeId, $orderId, $lineId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a specific order line item.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->deleteStoreOrderLine(
    'store_id',
    'order_id',
    'line_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$orderId:** `string` — The id for the order in a store.
    
</dd>
</dl>

<dl>
<dd>

**$lineId:** `string` — The id for the line item of an order.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;updateStoreOrderLine($storeId, $orderId, $lineId, $request) -> ?ECommerceOrderLineItem</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a specific order line item.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->updateStoreOrderLine(
    'store_id',
    'order_id',
    'line_id',
    new UpdateStoreOrderLineEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$orderId:** `string` — The id for the order in a store.
    
</dd>
</dl>

<dl>
<dd>

**$lineId:** `string` — The id for the line item of an order.
    
</dd>
</dl>

<dl>
<dd>

**$discount:** `float|string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$id:** `?string` — A unique identifier for the order line item.
    
</dd>
</dl>

<dl>
<dd>

**$price:** `float|string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$productId:** `?string` — A unique identifier for the product associated with the order line item.
    
</dd>
</dl>

<dl>
<dd>

**$productVariantId:** `?string` — A unique identifier for the product variant associated with the order line item.
    
</dd>
</dl>

<dl>
<dd>

**$quantity:** `?int` — The quantity of an order line item.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;listStoreProducts($storeId, $request) -> ?ListStoreProductsEcommerceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a store's products.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->listStoreProducts(
    'store_id',
    new ListStoreProductsEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;createStoreProduct($storeId, $request) -> ?ECommerceProduct</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add a new product to a store.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->createStoreProduct(
    'store_id',
    new CreateStoreProductEcommerceRequest([
        'body' => new EcommerceStoresOrdersPost([
            'id' => 'id',
            'title' => 'Cat Hat',
            'variants' => [
                new EcommerceStoresOrdersPostVariantsItem([
                    'id' => 'id',
                    'title' => 'Cat Hat',
                ]),
            ],
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$request:** `EcommerceStoresOrdersPost` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;getStoreProduct($storeId, $productId, $request) -> ?ECommerceProduct</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific product.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->getStoreProduct(
    'store_id',
    'product_id',
    new GetStoreProductEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$productId:** `string` — The id for the product of a store.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;upsertStoreProduct($storeId, $productId, $request) -> ?ECommerceProduct</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a specific product.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->upsertStoreProduct(
    'store_id',
    'product_id',
    new UpsertStoreProductEcommerceRequest([
        'id' => 'id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$productId:** `string` — The id for the product of a store.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — The description of a product.
    
</dd>
</dl>

<dl>
<dd>

**$handle:** `?string` — The handle of a product.
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string|int` — A unique identifier for the product.
    
</dd>
</dl>

<dl>
<dd>

**$imageUrl:** `?string` — The image URL for a product.
    
</dd>
</dl>

<dl>
<dd>

**$images:** `?array` — An array of the product's images.
    
</dd>
</dl>

<dl>
<dd>

**$publishedAtForeign:** `?string` — The date and time the product was published.
    
</dd>
</dl>

<dl>
<dd>

**$title:** `?string` — The title of a product.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — The type of product.
    
</dd>
</dl>

<dl>
<dd>

**$url:** `?string` — The URL for a product.
    
</dd>
</dl>

<dl>
<dd>

**$variants:** `?array` — An array of the product's variants. At least one variant is required for each product. A variant can use the same `id` and `title` as the parent product.
    
</dd>
</dl>

<dl>
<dd>

**$vendor:** `?string` — The vendor for a product.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;deleteStoreProduct($storeId, $productId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a product.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->deleteStoreProduct(
    'store_id',
    'product_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$productId:** `string` — The id for the product of a store.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;updateStoreProduct($storeId, $productId, $request) -> ?ECommerceProduct</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a specific product.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->updateStoreProduct(
    'store_id',
    'product_id',
    new UpdateStoreProductEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$productId:** `string` — The id for the product of a store.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — The description of a product.
    
</dd>
</dl>

<dl>
<dd>

**$handle:** `?string` — The handle of a product.
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string|int|null` — A unique identifier for the product.
    
</dd>
</dl>

<dl>
<dd>

**$imageUrl:** `?string` — The image URL for a product.
    
</dd>
</dl>

<dl>
<dd>

**$images:** `?array` — An array of the product's images.
    
</dd>
</dl>

<dl>
<dd>

**$publishedAtForeign:** `?string` — The date and time the product was published in ISO 8601 format.
    
</dd>
</dl>

<dl>
<dd>

**$title:** `?string` — The title of a product.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — The type of product.
    
</dd>
</dl>

<dl>
<dd>

**$url:** `?string` — The URL for a product.
    
</dd>
</dl>

<dl>
<dd>

**$variants:** `?array` — An array of the product's variants. At least one variant is required for each product. A variant can use the same `id` and `title` as the parent product.
    
</dd>
</dl>

<dl>
<dd>

**$vendor:** `?string` — The vendor for a product.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;listStoreProductImages($storeId, $productId, $request) -> ?ListStoreProductImagesEcommerceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a product's images.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->listStoreProductImages(
    'store_id',
    'product_id',
    new ListStoreProductImagesEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$productId:** `string` — The id for the product of a store.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;createStoreProductImage($storeId, $productId, $request) -> ?CreateStoreProductImageEcommerceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add a new image to the product.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->createStoreProductImage(
    'store_id',
    'product_id',
    new CreateStoreProductImageEcommerceRequest([
        'id' => 'id',
        'url' => 'url',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$productId:** `string` — The id for the product of a store.
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — A unique identifier for the product image.
    
</dd>
</dl>

<dl>
<dd>

**$url:** `string` — The URL for a product image.
    
</dd>
</dl>

<dl>
<dd>

**$variantIds:** `?array` — The list of product variants using the image.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;getStoreProductImage($storeId, $productId, $imageId, $request) -> ?GetStoreProductImageEcommerceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific product image.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->getStoreProductImage(
    'store_id',
    'product_id',
    'image_id',
    new GetStoreProductImageEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$productId:** `string` — The id for the product of a store.
    
</dd>
</dl>

<dl>
<dd>

**$imageId:** `string` — The id for the product image.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;deleteStoreProductImage($storeId, $productId, $imageId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a product image.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->deleteStoreProductImage(
    'store_id',
    'product_id',
    'image_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$productId:** `string` — The id for the product of a store.
    
</dd>
</dl>

<dl>
<dd>

**$imageId:** `string` — The id for the product image.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;updateStoreProductImage($storeId, $productId, $imageId, $request) -> ?UpdateStoreProductImageEcommerceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a product image.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->updateStoreProductImage(
    'store_id',
    'product_id',
    'image_id',
    new UpdateStoreProductImageEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$productId:** `string` — The id for the product of a store.
    
</dd>
</dl>

<dl>
<dd>

**$imageId:** `string` — The id for the product image.
    
</dd>
</dl>

<dl>
<dd>

**$id:** `?string` — A unique identifier for the product image.
    
</dd>
</dl>

<dl>
<dd>

**$url:** `?string` — The URL for a product image.
    
</dd>
</dl>

<dl>
<dd>

**$variantIds:** `?array` — The list of product variants using the image.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;listStoreProductVariants($storeId, $productId, $request) -> ?ListStoreProductVariantsEcommerceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a product's variants.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->listStoreProductVariants(
    'store_id',
    'product_id',
    new ListStoreProductVariantsEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$productId:** `string` — The id for the product of a store.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;createStoreProductVariant($storeId, $productId, $request) -> ?ECommerceProductVariant</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add a new variant to the product.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->createStoreProductVariant(
    'store_id',
    'product_id',
    new CreateStoreProductVariantEcommerceRequest([
        'id' => 'id',
        'title' => 'Cat Hat',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$productId:** `string` — The id for the product of a store.
    
</dd>
</dl>

<dl>
<dd>

**$backorders:** `?string` — The backorders of a product variant.
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string|int` — A unique identifier for the product variant.
    
</dd>
</dl>

<dl>
<dd>

**$imageUrl:** `?string` — The image URL for a product variant.
    
</dd>
</dl>

<dl>
<dd>

**$inventoryQuantity:** `?int` — The inventory quantity of a product variant.
    
</dd>
</dl>

<dl>
<dd>

**$price:** `float|string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$sku:** `?string` — The stock keeping unit (SKU) of a product variant.
    
</dd>
</dl>

<dl>
<dd>

**$title:** `string` — The title of a product variant.
    
</dd>
</dl>

<dl>
<dd>

**$url:** `?string` — The URL for a product variant.
    
</dd>
</dl>

<dl>
<dd>

**$visibility:** `?string` — The visibility of a product variant.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;getStoreProductVariant($storeId, $productId, $variantId, $request) -> ?ECommerceProductVariant</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific product variant.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->getStoreProductVariant(
    'store_id',
    'product_id',
    'variant_id',
    new GetStoreProductVariantEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$productId:** `string` — The id for the product of a store.
    
</dd>
</dl>

<dl>
<dd>

**$variantId:** `string` — The id for the product variant.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;upsertStoreProductVariant($storeId, $productId, $variantId, $request) -> ?ECommerceProductVariant</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add or update a product variant.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->upsertStoreProductVariant(
    'store_id',
    'product_id',
    'variant_id',
    new UpsertStoreProductVariantEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$productId:** `string` — The id for the product of a store.
    
</dd>
</dl>

<dl>
<dd>

**$variantId:** `string` — The id for the product variant.
    
</dd>
</dl>

<dl>
<dd>

**$backorders:** `?string` — The backorders of a product variant.
    
</dd>
</dl>

<dl>
<dd>

**$id:** `?string` — A unique identifier for the product variant.
    
</dd>
</dl>

<dl>
<dd>

**$imageUrl:** `?string` — The image URL for a product variant.
    
</dd>
</dl>

<dl>
<dd>

**$inventoryQuantity:** `?int` — The inventory quantity of a product variant.
    
</dd>
</dl>

<dl>
<dd>

**$price:** `float|string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$sku:** `?string` — The stock keeping unit (SKU) of a product variant.
    
</dd>
</dl>

<dl>
<dd>

**$title:** `?string` — The title of a product variant.
    
</dd>
</dl>

<dl>
<dd>

**$url:** `?string` — The URL for a product variant.
    
</dd>
</dl>

<dl>
<dd>

**$visibility:** `?string` — The visibility of a product variant.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;deleteStoreProductVariant($storeId, $productId, $variantId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a product variant.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->deleteStoreProductVariant(
    'store_id',
    'product_id',
    'variant_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$productId:** `string` — The id for the product of a store.
    
</dd>
</dl>

<dl>
<dd>

**$variantId:** `string` — The id for the product variant.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;updateStoreProductVariant($storeId, $productId, $variantId, $request) -> ?ECommerceProductVariant</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a product variant.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->updateStoreProductVariant(
    'store_id',
    'product_id',
    'variant_id',
    new UpdateStoreProductVariantEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$productId:** `string` — The id for the product of a store.
    
</dd>
</dl>

<dl>
<dd>

**$variantId:** `string` — The id for the product variant.
    
</dd>
</dl>

<dl>
<dd>

**$backorders:** `?string` — The backorders of a product variant.
    
</dd>
</dl>

<dl>
<dd>

**$imageUrl:** `?string` — The image URL for a product variant.
    
</dd>
</dl>

<dl>
<dd>

**$inventoryQuantity:** `?int` — The inventory quantity of a product variant.
    
</dd>
</dl>

<dl>
<dd>

**$price:** `float|string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$sku:** `?string` — The stock keeping unit (SKU) of a product variant.
    
</dd>
</dl>

<dl>
<dd>

**$title:** `?string` — The title of a product variant.
    
</dd>
</dl>

<dl>
<dd>

**$url:** `?string` — The URL for a product variant.
    
</dd>
</dl>

<dl>
<dd>

**$visibility:** `?string` — The visibility of a product variant.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;listStorePromoRules($storeId, $request) -> ?ListStorePromoRulesEcommerceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a store's promo rules.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->listStorePromoRules(
    'store_id',
    new ListStorePromoRulesEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;createStorePromoRule($storeId, $request) -> ?ECommercePromoRule</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add a new promo rule to a store.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->createStorePromoRule(
    'store_id',
    new CreateStorePromoRuleEcommerceRequest([
        'amount' => 1.1,
        'description' => 'Save BIG during our summer sale!',
        'id' => 'id',
        'target' => CreateStorePromoRuleEcommerceRequestTarget::PerItem->value,
        'type' => CreateStorePromoRuleEcommerceRequestType::Fixed->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$amount:** `float|string` 
    
</dd>
</dl>

<dl>
<dd>

**$createdAtForeign:** `?string` — The date and time the promotion was created in ISO 8601 format.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `string` — The description of a promotion restricted to UTF-8 characters with max length 255.
    
</dd>
</dl>

<dl>
<dd>

**$enabled:** `?bool` — Whether the promo rule is currently enabled.
    
</dd>
</dl>

<dl>
<dd>

**$endsAt:** `DateTime|string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — A unique identifier for the promo rule. If Ecommerce platform does not support promo rule, use promo code id as promo rule id. Restricted to UTF-8 characters with max length 50.
    
</dd>
</dl>

<dl>
<dd>

**$startsAt:** `DateTime|string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$target:** `string` — The target that the discount applies to.
    
</dd>
</dl>

<dl>
<dd>

**$title:** `?string` — The title that will show up in promotion campaign. Restricted to UTF-8 characters with max length of 100 bytes.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `string` — Type of discount. For free shipping set type to fixed.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtForeign:** `?string` — The date and time the promotion was updated in ISO 8601 format.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;getStorePromoRule($storeId, $promoRuleId, $request) -> ?ECommercePromoRule</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific promo rule.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->getStorePromoRule(
    'store_id',
    'promo_rule_id',
    new GetStorePromoRuleEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$promoRuleId:** `string` — The id for the promo rule of a store.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;deleteStorePromoRule($storeId, $promoRuleId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a promo rule from a store.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->deleteStorePromoRule(
    'store_id',
    'promo_rule_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$promoRuleId:** `string` — The id for the promo rule of a store.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;updateStorePromoRule($storeId, $promoRuleId, $request) -> ?ECommercePromoRule</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a promo rule.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->updateStorePromoRule(
    'store_id',
    'promo_rule_id',
    new UpdateStorePromoRuleEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$promoRuleId:** `string` — The id for the promo rule of a store.
    
</dd>
</dl>

<dl>
<dd>

**$amount:** `float|string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$createdAtForeign:** `?string` — The date and time the promotion was created in ISO 8601 format.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — The description of a promotion restricted to UTF-8 characters with max length 255.
    
</dd>
</dl>

<dl>
<dd>

**$enabled:** `?bool` — Whether the promo rule is currently enabled.
    
</dd>
</dl>

<dl>
<dd>

**$endsAt:** `DateTime|string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$id:** `?string` — A unique identifier for the promo rule. If Ecommerce platform does not support promo rule, use promo code id as promo rule id. Restricted to UTF-8 characters with max length 50.
    
</dd>
</dl>

<dl>
<dd>

**$startsAt:** `DateTime|string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$target:** `?string` — The target that the discount applies to.
    
</dd>
</dl>

<dl>
<dd>

**$title:** `?string` — The title that will show up in promotion campaign. Restricted to UTF-8 characters with max length of 100 bytes.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — Type of discount. For free shipping set type to fixed.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtForeign:** `?string` — The date and time the promotion was updated in ISO 8601 format.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;listStorePromoRulePromoCodes($storeId, $promoRuleId, $request) -> ?ListStorePromoRulePromoCodesEcommerceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a store's promo codes.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->listStorePromoRulePromoCodes(
    'store_id',
    'promo_rule_id',
    new ListStorePromoRulePromoCodesEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$promoRuleId:** `string` — The id for the promo rule of a store.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;createStorePromoRulePromoCode($storeId, $promoRuleId, $request) -> ?ECommercePromoCode</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add a new promo code to a store.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->createStorePromoRulePromoCode(
    'store_id',
    'promo_rule_id',
    new CreateStorePromoRulePromoCodeEcommerceRequest([
        'code' => 'summersale',
        'id' => 'id',
        'redemptionUrl' => 'A url that applies promo code directly at checkout or a url that points to sale page or store url',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$promoRuleId:** `string` — The id for the promo rule of a store.
    
</dd>
</dl>

<dl>
<dd>

**$code:** `string` — The discount code. Restricted to UTF-8 characters with max length 50.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtForeign:** `?string` — The date and time the promotion was created in ISO 8601 format.
    
</dd>
</dl>

<dl>
<dd>

**$enabled:** `?bool` — Whether the promo code is currently enabled.
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — A unique identifier for the promo code. Restricted to UTF-8 characters with max length 50.
    
</dd>
</dl>

<dl>
<dd>

**$redemptionUrl:** `string` — The url that should be used in the promotion campaign restricted to UTF-8 characters with max length 2000.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtForeign:** `?string` — The date and time the promotion was updated in ISO 8601 format.
    
</dd>
</dl>

<dl>
<dd>

**$usageCount:** `?int` — Number of times promo code has been used.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;getStorePromoRulePromoCode($storeId, $promoRuleId, $promoCodeId, $request) -> ?ECommercePromoCode</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific promo code.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->getStorePromoRulePromoCode(
    'store_id',
    'promo_rule_id',
    'promo_code_id',
    new GetStorePromoRulePromoCodeEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$promoRuleId:** `string` — The id for the promo rule of a store.
    
</dd>
</dl>

<dl>
<dd>

**$promoCodeId:** `string` — The id for the promo code of a store.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;deleteStorePromoRulePromoCode($storeId, $promoRuleId, $promoCodeId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a promo code from a store.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->deleteStorePromoRulePromoCode(
    'store_id',
    'promo_rule_id',
    'promo_code_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$promoRuleId:** `string` — The id for the promo rule of a store.
    
</dd>
</dl>

<dl>
<dd>

**$promoCodeId:** `string` — The id for the promo code of a store.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ecommerce-&gt;updateStorePromoRulePromoCode($storeId, $promoRuleId, $promoCodeId, $request) -> ?ECommercePromoCode</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a promo code.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ecommerce->updateStorePromoRulePromoCode(
    'store_id',
    'promo_rule_id',
    'promo_code_id',
    new UpdateStorePromoRulePromoCodeEcommerceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storeId:** `string` — The store id.
    
</dd>
</dl>

<dl>
<dd>

**$promoRuleId:** `string` — The id for the promo rule of a store.
    
</dd>
</dl>

<dl>
<dd>

**$promoCodeId:** `string` — The id for the promo code of a store.
    
</dd>
</dl>

<dl>
<dd>

**$code:** `?string` — The discount code. Restricted to UTF-8 characters with max length 50.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtForeign:** `?string` — The date and time the promotion was created in ISO 8601 format.
    
</dd>
</dl>

<dl>
<dd>

**$enabled:** `?bool` — Whether the promo code is currently enabled.
    
</dd>
</dl>

<dl>
<dd>

**$id:** `?string` — A unique identifier for the promo code. Restricted to UTF-8 characters with max length 50.
    
</dd>
</dl>

<dl>
<dd>

**$redemptionUrl:** `?string` — The url that should be used in the promotion campaign restricted to UTF-8 characters with max length 2000.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtForeign:** `?string` — The date and time the promotion was updated in ISO 8601 format.
    
</dd>
</dl>

<dl>
<dd>

**$usageCount:** `?int` — Number of times promo code has been used.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## FacebookAds
<details><summary><code>$client-&gt;facebookAds-&gt;list($request) -> ?ListFacebookAdsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get list of Facebook ads.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->facebookAds->list(
    new ListFacebookAdsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$sortField:** `?string` — Returns files sorted by the specified field.
    
</dd>
</dl>

<dl>
<dd>

**$sortDir:** `?string` — Determines the order direction for sorted results.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;facebookAds-&gt;get($outreachId, $request) -> ?FacebookAds</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get details of a Facebook ad.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->facebookAds->get(
    'outreach_id',
    new GetFacebookAdsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$outreachId:** `string` — The outreach id.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## FileManager
<details><summary><code>$client-&gt;fileManager-&gt;list() -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about the file-manager endpoint's resources
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileManager->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileManager-&gt;listFiles($request) -> ?ListFilesFileManagerResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a list of available images and files stored in the File Manager for the account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileManager->listFiles(
    new ListFilesFileManagerRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — The file type for the File Manager file.
    
</dd>
</dl>

<dl>
<dd>

**$createdBy:** `?string` — The Mailchimp account user who created the File Manager file.
    
</dd>
</dl>

<dl>
<dd>

**$beforeCreatedAt:** `?string` — Restrict the response to files created before the set date. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$sinceCreatedAt:** `?string` — Restrict the response to files created after the set date. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$sortField:** `?string` — Returns files sorted by the specified field.
    
</dd>
</dl>

<dl>
<dd>

**$sortDir:** `?string` — Determines the order direction for sorted results.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileManager-&gt;createFile($request) -> ?GalleryFile</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Upload a new image or file to the File Manager.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileManager->createFile(
    new CreateFileFileManagerRequest([
        'fileData' => 'file_data',
        'name' => 'name',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fileData:** `string` — The base64-encoded contents of the file.
    
</dd>
</dl>

<dl>
<dd>

**$folderId:** `?int` — The id of the folder.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — The name of the file.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileManager-&gt;getFile($fileId, $request) -> ?GalleryFile</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific file in the File Manager.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileManager->getFile(
    'file_id',
    new GetFileFileManagerRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fileId:** `string` — The unique id for the File Manager file.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileManager-&gt;deleteFile($fileId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Remove a specific file from the File Manager.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileManager->deleteFile(
    'file_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fileId:** `string` — The unique id for the File Manager file.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileManager-&gt;updateFile($fileId, $request) -> ?GalleryFile</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a file in the File Manager.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileManager->updateFile(
    'file_id',
    new UpdateFileFileManagerRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fileId:** `string` — The unique id for the File Manager file.
    
</dd>
</dl>

<dl>
<dd>

**$folderId:** `?int` — The id of the folder. Setting `folder_id` to `0` will remove a file from its current folder.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — The name of the file.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileManager-&gt;listFolders($request) -> ?ListFoldersFileManagerResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a list of all folders in the File Manager.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileManager->listFolders(
    new ListFoldersFileManagerRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$createdBy:** `?string` — The Mailchimp account user who created the File Manager file.
    
</dd>
</dl>

<dl>
<dd>

**$beforeCreatedAt:** `?string` — Restrict the response to files created before the set date. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$sinceCreatedAt:** `?string` — Restrict the response to files created after the set date. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileManager-&gt;createFolder($request) -> ?CreateFolderFileManagerResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new folder in the File Manager.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileManager->createFolder(
    new CreateFolderFileManagerRequest([
        'name' => 'name',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `string` — The name of the folder.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileManager-&gt;getFolder($folderId, $request) -> ?GetFolderFileManagerResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific folder in the File Manager.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileManager->getFolder(
    'folder_id',
    new GetFolderFileManagerRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$folderId:** `string` — The unique id for the File Manager folder.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileManager-&gt;deleteFolder($folderId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a specific folder in the File Manager.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileManager->deleteFolder(
    'folder_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$folderId:** `string` — The unique id for the File Manager folder.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileManager-&gt;updateFolder($folderId, $request) -> ?UpdateFolderFileManagerResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a specific File Manager folder.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileManager->updateFolder(
    'folder_id',
    new UpdateFolderFileManagerRequest([
        'name' => 'name',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$folderId:** `string` — The unique id for the File Manager folder.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — The name of the folder.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileManager-&gt;listFolderFiles($folderId, $request) -> ?ListFolderFilesFileManagerResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a list of available images and files stored in this folder.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileManager->listFolderFiles(
    'folder_id',
    new ListFolderFilesFileManagerRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$folderId:** `string` — The unique id for the File Manager folder.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — The file type for the File Manager file.
    
</dd>
</dl>

<dl>
<dd>

**$createdBy:** `?string` — The Mailchimp account user who created the File Manager file.
    
</dd>
</dl>

<dl>
<dd>

**$beforeCreatedAt:** `?string` — Restrict the response to files created before the set date. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$sinceCreatedAt:** `?string` — Restrict the response to files created after the set date. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$sortField:** `?string` — Returns files sorted by the specified field.
    
</dd>
</dl>

<dl>
<dd>

**$sortDir:** `?string` — Determines the order direction for sorted results.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## LandingPages
<details><summary><code>$client-&gt;landingPages-&gt;list($request) -> ?ListLandingPagesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get all landing pages.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->list(
    new ListLandingPagesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sortDir:** `?string` — Determines the order direction for sorted results.
    
</dd>
</dl>

<dl>
<dd>

**$sortField:** `?string` — Returns files sorted by the specified field.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;landingPages-&gt;create($request) -> ?LandingPage</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create an unpublished and contentless Mailchimp landing page.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->create(
    new CreateLandingPagesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$useDefaultList:** `?bool` — Will create the Landing Page using the account's Default List instead of requiring a list_id.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — The description of this landing page.
    
</dd>
</dl>

<dl>
<dd>

**$listId:** `?string` — The list's ID associated with this landing page.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — The name of this landing page.
    
</dd>
</dl>

<dl>
<dd>

**$storeId:** `?string` — The ID of the store associated with this landing page.
    
</dd>
</dl>

<dl>
<dd>

**$templateId:** `?int` — The template_id of this landing page.
    
</dd>
</dl>

<dl>
<dd>

**$title:** `?string` — The title of this landing page seen in the browser's title bar.
    
</dd>
</dl>

<dl>
<dd>

**$tracking:** `?CreateLandingPagesRequestTracking` — The tracking settings applied to this landing page.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — The type of template the landing page has.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;landingPages-&gt;get($pageId, $request) -> ?LandingPage</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific page.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->get(
    'page_id',
    new GetLandingPagesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$pageId:** `string` — The unique id for the page.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;landingPages-&gt;delete($pageId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a landing page.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->delete(
    'page_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$pageId:** `string` — The unique id for the page.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;landingPages-&gt;update($pageId, $request) -> ?LandingPage</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a landing page.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->update(
    'page_id',
    new UpdateLandingPagesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$pageId:** `string` — The unique id for the page.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — The description of this landing page.
    
</dd>
</dl>

<dl>
<dd>

**$listId:** `?string` — The list's ID associated with this landing page.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — The name of this landing page.
    
</dd>
</dl>

<dl>
<dd>

**$storeId:** `?string` — The ID of the store associated with this landing page.
    
</dd>
</dl>

<dl>
<dd>

**$title:** `?string` — The title of this landing page seen in the browser's title bar.
    
</dd>
</dl>

<dl>
<dd>

**$tracking:** `?UpdateLandingPagesRequestTracking` — The tracking settings applied to this landing page.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;landingPages-&gt;createActionPublish($pageId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Publish a landing page that is in draft, unpublished, or has been previously published and edited.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->createActionPublish(
    'page_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$pageId:** `string` — The unique id for the page.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;landingPages-&gt;createActionUnpublish($pageId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Unpublish a landing page that is in draft or has been published.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->createActionUnpublish(
    'page_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$pageId:** `string` — The unique id for the page.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;landingPages-&gt;listContent($pageId, $request) -> ?ListContentLandingPagesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get the the HTML for your landing page.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->listContent(
    'page_id',
    new ListContentLandingPagesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$pageId:** `string` — The unique id for the page.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## lists
<details><summary><code>$client-&gt;lists-&gt;list($request) -> ?ListListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about all lists in the account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->list(
    new ListListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$beforeDateCreated:** `?string` — Restrict response to lists created before the set date. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$sinceDateCreated:** `?string` — Restrict results to lists created after the set date. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$beforeCampaignLastSent:** `?string` — Restrict results to lists created before the last campaign send date. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$sinceCampaignLastSent:** `?string` — Restrict results to lists created after the last campaign send date. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$email:** `?string` — Restrict results to lists that include a specific subscriber's email address.
    
</dd>
</dl>

<dl>
<dd>

**$sortField:** `?string` — Returns files sorted by the specified field.
    
</dd>
</dl>

<dl>
<dd>

**$sortDir:** `?string` — Determines the order direction for sorted results.
    
</dd>
</dl>

<dl>
<dd>

**$hasEcommerceStore:** `?bool` — Restrict results to lists that contain an active, connected, undeleted ecommerce store.
    
</dd>
</dl>

<dl>
<dd>

**$includeTotalContacts:** `?bool` — Deprecated. Return the total_contacts field in the stats response, which contains an approximate count of subscribed, unsubscribed, and transactional contacts. For a complete audience contact count, use the /audiences endpoint instead.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;create($request) -> ?SubscriberList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new list in your Mailchimp account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->create(
    new CreateListsRequest([
        'campaignDefaults' => new CreateListsRequestCampaignDefaults([
            'fromEmail' => 'from_email',
            'fromName' => 'from_name',
            'language' => 'language',
            'subject' => 'subject',
        ]),
        'contact' => new CreateListsRequestContact([
            'address1' => 'address1',
            'city' => 'city',
            'company' => 'company',
            'country' => 'country',
        ]),
        'emailTypeOption' => true,
        'name' => 'name',
        'permissionReminder' => 'permission_reminder',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignDefaults:** `CreateListsRequestCampaignDefaults` — [Default values for campaigns](https://mailchimp.com/help/edit-your-emails-subject-preview-text-from-name-or-from-email-address/) created for this list.
    
</dd>
</dl>

<dl>
<dd>

**$contact:** `CreateListsRequestContact` — [Contact information displayed in campaign footers](https://mailchimp.com/help/about-campaign-footers/) to comply with international spam laws.
    
</dd>
</dl>

<dl>
<dd>

**$doubleOptin:** `?bool` — Whether or not to require the subscriber to confirm subscription via email.
    
</dd>
</dl>

<dl>
<dd>

**$emailTypeOption:** `bool` — Whether the list supports [multiple formats for emails](https://mailchimp.com/help/audience-settings-and-defaults/). When set to `true`, subscribers can choose whether they want to receive HTML or plain-text emails. When set to `false`, subscribers will receive HTML emails, with a plain-text alternative backup.
    
</dd>
</dl>

<dl>
<dd>

**$marketingPermissions:** `?bool` — Whether or not the list has marketing permissions (eg. GDPR) enabled.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — The name of the list.
    
</dd>
</dl>

<dl>
<dd>

**$notifyOnSubscribe:** `?string` — The email address to send [subscribe notifications](https://mailchimp.com/help/change-subscribe-and-unsubscribe-notifications/) to.
    
</dd>
</dl>

<dl>
<dd>

**$notifyOnUnsubscribe:** `?string` — The email address to send [unsubscribe notifications](https://mailchimp.com/help/change-subscribe-and-unsubscribe-notifications/) to.
    
</dd>
</dl>

<dl>
<dd>

**$permissionReminder:** `string` — The [permission reminder](https://mailchimp.com/help/edit-the-permission-reminder/) for the list.
    
</dd>
</dl>

<dl>
<dd>

**$useArchiveBar:** `?bool` — Whether campaigns for this list use the [Archive Bar](https://mailchimp.com/help/about-email-campaign-archives-and-pages/) in archives by default.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;get($listId, $request) -> ?SubscriberList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific list in your Mailchimp account. Results include list members who have signed up but haven't confirmed their subscription yet and unsubscribed or cleaned.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->get(
    'list_id',
    new GetListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$includeTotalContacts:** `?bool` — Deprecated. Return the total_contacts field in the stats response, which contains an approximate count of subscribed, unsubscribed, and transactional contacts. For a complete audience contact count, use the /audiences endpoint instead.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;batchSubscribeOrUnsubscribe($listId, $request) -> ?BatchSubscribeOrUnsubscribeListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Batch subscribe or unsubscribe list members.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->batchSubscribeOrUnsubscribe(
    'list_id',
    new BatchSubscribeOrUnsubscribeListsRequest([
        'members' => [],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$skipMergeValidation:** `?bool` — If skip_merge_validation is true, member data will be accepted without merge field values, even if the merge field is usually required. This defaults to false.
    
</dd>
</dl>

<dl>
<dd>

**$skipDuplicateCheck:** `?bool` — If skip_duplicate_check is true, we will ignore duplicates sent in the request when using the batch sub/unsub on the lists endpoint. The status of the first appearance in the request will be saved. This defaults to false.
    
</dd>
</dl>

<dl>
<dd>

**$members:** `array` — An array of objects, each representing an email address and the subscription status for a specific list. Up to 500 members may be added or updated with each API call.
    
</dd>
</dl>

<dl>
<dd>

**$syncTags:** `?bool` — Whether this batch operation will replace all existing tags with tags in request.
    
</dd>
</dl>

<dl>
<dd>

**$updateExisting:** `?bool` — Whether this batch operation will change existing members' subscription status.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;delete($listId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a list from your Mailchimp account. If you delete a list, you'll lose the list history—including subscriber activity, unsubscribes, complaints, and bounces. You’ll also lose subscribers’ email addresses, unless you exported and backed up your list.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->delete(
    'list_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;update($listId, $request) -> ?SubscriberList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update the settings for a specific list.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->update(
    'list_id',
    new UpdateListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$campaignDefaults:** `?UpdateListsRequestCampaignDefaults` — [Default values for campaigns](https://mailchimp.com/help/edit-your-emails-subject-preview-text-from-name-or-from-email-address/) created for this list.
    
</dd>
</dl>

<dl>
<dd>

**$contact:** `?UpdateListsRequestContact` — [Contact information displayed in campaign footers](https://mailchimp.com/help/about-campaign-footers/) to comply with international spam laws.
    
</dd>
</dl>

<dl>
<dd>

**$doubleOptin:** `?bool` — Whether or not to require the subscriber to confirm subscription via email.
    
</dd>
</dl>

<dl>
<dd>

**$emailTypeOption:** `?bool` — Whether the list supports [multiple formats for emails](https://mailchimp.com/help/audience-settings-and-defaults/). When set to `true`, subscribers can choose whether they want to receive HTML or plain-text emails. When set to `false`, subscribers will receive HTML emails, with a plain-text alternative backup.
    
</dd>
</dl>

<dl>
<dd>

**$marketingPermissions:** `?bool` — Whether or not the list has marketing permissions (eg. GDPR) enabled.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — The name of the list.
    
</dd>
</dl>

<dl>
<dd>

**$notifyOnSubscribe:** `?string` — The email address to send [subscribe notifications](https://mailchimp.com/help/change-subscribe-and-unsubscribe-notifications/) to.
    
</dd>
</dl>

<dl>
<dd>

**$notifyOnUnsubscribe:** `?string` — The email address to send [unsubscribe notifications](https://mailchimp.com/help/change-subscribe-and-unsubscribe-notifications/) to.
    
</dd>
</dl>

<dl>
<dd>

**$permissionReminder:** `?string` — The [permission reminder](https://mailchimp.com/help/edit-the-permission-reminder/) for the list.
    
</dd>
</dl>

<dl>
<dd>

**$useArchiveBar:** `?bool` — Whether campaigns for this list use the [Archive Bar](https://mailchimp.com/help/about-email-campaign-archives-and-pages/) in archives by default.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;listAbuseReports($listId, $request) -> ?ListAbuseReportsListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get all abuse reports for a specific list.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->listAbuseReports(
    'list_id',
    new ListAbuseReportsListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;getAbuseReport($listId, $reportId, $request) -> ?ListsAbuseReports</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get details about a specific abuse report.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->getAbuseReport(
    'list_id',
    'report_id',
    new GetAbuseReportListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$reportId:** `string` — The id for the abuse report.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;listActivity($listId, $request) -> ?ListActivityListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get up to the previous 180 days of daily detailed aggregated activity stats for a list, not including Automation activity.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->listActivity(
    'list_id',
    new ListActivityListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;listClients($listId, $request) -> ?ListClientsListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a list of the top email clients based on user-agent strings.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->listClients(
    'list_id',
    new ListClientsListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;listGrowthHistory($listId, $request) -> ?ListGrowthHistoryListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a month-by-month summary of a specific list's growth activity.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->listGrowthHistory(
    'list_id',
    new ListGrowthHistoryListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$sortField:** `?string` — Returns files sorted by the specified field.
    
</dd>
</dl>

<dl>
<dd>

**$sortDir:** `?string` — Determines the order direction for sorted results.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;getGrowthHistory($listId, $month, $request) -> ?GrowthHistory</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a summary of a specific list's growth activity for a specific month and year.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->getGrowthHistory(
    'list_id',
    'month',
    new GetGrowthHistoryListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$month:** `string` — A specific month of list growth history.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;listInterestCategories($listId, $request) -> ?ListInterestCategoriesListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a list's interest categories.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->listInterestCategories(
    'list_id',
    new ListInterestCategoriesListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — Restrict results a type of interest group
    
</dd>
</dl>

<dl>
<dd>

**$sortField:** `?string` — Returns interest categories sorted by the specified field. Defaults to display_order.
    
</dd>
</dl>

<dl>
<dd>

**$sortDir:** `?string` — Determines the order direction for sorted results.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;createInterestCategory($listId, $request) -> ?InterestCategory</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new interest category.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->createInterestCategory(
    'list_id',
    new CreateInterestCategoryListsRequest([
        'title' => 'title',
        'type' => CreateInterestCategoryListsRequestType::Checkboxes->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$displayOrder:** `?int` — The order that the categories are displayed in the list. Lower numbers display first.
    
</dd>
</dl>

<dl>
<dd>

**$title:** `string` — The text description of this category. This field appears on signup forms and is often phrased as a question.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `string` — Determines how this category’s interests appear on signup forms.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;getInterestCategory($listId, $interestCategoryId, $request) -> ?InterestCategory</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific interest category.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->getInterestCategory(
    'list_id',
    'interest_category_id',
    new GetInterestCategoryListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$interestCategoryId:** `string` — The unique ID for the interest category.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;deleteInterestCategory($listId, $interestCategoryId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a specific interest category.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->deleteInterestCategory(
    'list_id',
    'interest_category_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$interestCategoryId:** `string` — The unique ID for the interest category.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;updateInterestCategory($listId, $interestCategoryId, $request) -> ?InterestCategory</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a specific interest category.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->updateInterestCategory(
    'list_id',
    'interest_category_id',
    new UpdateInterestCategoryListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$interestCategoryId:** `string` — The unique ID for the interest category.
    
</dd>
</dl>

<dl>
<dd>

**$displayOrder:** `?int` — The order that the categories are displayed in the list. Lower numbers display first.
    
</dd>
</dl>

<dl>
<dd>

**$title:** `?string` — The text description of this category. This field appears on signup forms and is often phrased as a question.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — Determines how this category’s interests appear on signup forms.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;listInterestCategoryInterests($listId, $interestCategoryId, $request) -> ?ListInterestCategoryInterestsListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a list of this category's interests.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->listInterestCategoryInterests(
    'list_id',
    'interest_category_id',
    new ListInterestCategoryInterestsListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$interestCategoryId:** `string` — The unique ID for the interest category.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;createInterestCategoryInterest($listId, $interestCategoryId, $request) -> ?Interest</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new interest or 'group name' for a specific category.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->createInterestCategoryInterest(
    'list_id',
    'interest_category_id',
    new CreateInterestCategoryInterestListsRequest([
        'name' => 'name',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$interestCategoryId:** `string` — The unique ID for the interest category.
    
</dd>
</dl>

<dl>
<dd>

**$displayOrder:** `?int` — The display order for interests.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — The name of the interest. This can be shown publicly on a subscription form.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;getInterestCategoryInterest($listId, $interestCategoryId, $interestId, $request) -> ?Interest</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get interests or 'group names' for a specific category.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->getInterestCategoryInterest(
    'list_id',
    'interest_category_id',
    'interest_id',
    new GetInterestCategoryInterestListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$interestCategoryId:** `string` — The unique ID for the interest category.
    
</dd>
</dl>

<dl>
<dd>

**$interestId:** `string` — The specific interest or 'group name'.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;deleteInterestCategoryInterest($listId, $interestCategoryId, $interestId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete interests or group names in a specific category.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->deleteInterestCategoryInterest(
    'list_id',
    'interest_category_id',
    'interest_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$interestCategoryId:** `string` — The unique ID for the interest category.
    
</dd>
</dl>

<dl>
<dd>

**$interestId:** `string` — The specific interest or 'group name'.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;updateInterestCategoryInterest($listId, $interestCategoryId, $interestId, $request) -> ?Interest</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update interests or 'group names' for a specific category.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->updateInterestCategoryInterest(
    'list_id',
    'interest_category_id',
    'interest_id',
    new UpdateInterestCategoryInterestListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$interestCategoryId:** `string` — The unique ID for the interest category.
    
</dd>
</dl>

<dl>
<dd>

**$interestId:** `string` — The specific interest or 'group name'.
    
</dd>
</dl>

<dl>
<dd>

**$displayOrder:** `?int` — The display order for interests.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — The name of the interest. This can be shown publicly on a subscription form.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;listLocations($listId, $request) -> ?ListLocationsListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get the locations (countries) that the list's subscribers have been tagged to based on geocoding their IP address.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->listLocations(
    'list_id',
    new ListLocationsListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;listMembers($listId, $request) -> ?ListMembersListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about members in a specific Mailchimp list.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->listMembers(
    'list_id',
    new ListMembersListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$emailType:** `?string` — The email type.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — The subscriber's status.
    
</dd>
</dl>

<dl>
<dd>

**$sinceTimestampOpt:** `?string` — Restrict results to subscribers who opted-in after the set timeframe. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$beforeTimestampOpt:** `?string` — Restrict results to subscribers who opted-in before the set timeframe. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$sinceLastChanged:** `?string` — Restrict results to subscribers whose information changed after the set timeframe. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$beforeLastChanged:** `?string` — Restrict results to subscribers whose information changed before the set timeframe. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$uniqueEmailId:** `?string` — A unique identifier for the email address across all Mailchimp lists.
    
</dd>
</dl>

<dl>
<dd>

**$vipOnly:** `?bool` — A filter to return only the list's VIP members. Passing `true` will restrict results to VIP list members, passing `false` will return all list members.
    
</dd>
</dl>

<dl>
<dd>

**$interestCategoryId:** `?string` — The unique id for the interest category.
    
</dd>
</dl>

<dl>
<dd>

**$interestIds:** `?string` — Used to filter list members by interests. Must be accompanied by interest_category_id and interest_match. The value must be a comma separated list of interest ids present for any supplied interest categories.
    
</dd>
</dl>

<dl>
<dd>

**$interestMatch:** `?string` — Used to filter list members by interests. Must be accompanied by interest_category_id and interest_ids. "any" will match a member with any of the interest supplied, "all" will only match members with every interest supplied, and "none" will match members without any of the interest supplied.
    
</dd>
</dl>

<dl>
<dd>

**$sortField:** `?string` — Returns files sorted by the specified field.
    
</dd>
</dl>

<dl>
<dd>

**$sortDir:** `?string` — Determines the order direction for sorted results.
    
</dd>
</dl>

<dl>
<dd>

**$sinceLastCampaign:** `?bool` — Filter subscribers by those subscribed/unsubscribed/pending/cleaned since last email campaign send. Member status is required to use this filter.
    
</dd>
</dl>

<dl>
<dd>

**$unsubscribedSince:** `?string` — Filter subscribers by those unsubscribed since a specific date. Using any status other than unsubscribed with this filter will result in an error.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;createMember($listId, $request) -> ?ListMembers</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add a new member to the list.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->createMember(
    'list_id',
    new CreateMemberListsRequest([
        'emailAddress' => 'email_address',
        'status' => CreateMemberListsRequestStatus::Subscribed->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$skipMergeValidation:** `?bool` — If skip_merge_validation is true, member data will be accepted without merge field values, even if the merge field is usually required. This defaults to false.
    
</dd>
</dl>

<dl>
<dd>

**$emailAddress:** `string` — Email address for a subscriber.
    
</dd>
</dl>

<dl>
<dd>

**$emailType:** `?string` — Type of email this member asked to get ('html' or 'text').
    
</dd>
</dl>

<dl>
<dd>

**$interests:** `?array` — The key of this object's properties is the ID of the interest in question.
    
</dd>
</dl>

<dl>
<dd>

**$ipOpt:** `?string` — The IP address the subscriber used to confirm their opt-in status.
    
</dd>
</dl>

<dl>
<dd>

**$ipSignup:** `?string` — IP address the subscriber signed up from.
    
</dd>
</dl>

<dl>
<dd>

**$language:** `?string` — If set/detected, the [subscriber's language](https://mailchimp.com/help/view-and-edit-contact-languages/).
    
</dd>
</dl>

<dl>
<dd>

**$location:** `?CreateMemberListsRequestLocation` — Subscriber location information.
    
</dd>
</dl>

<dl>
<dd>

**$marketingPermissions:** `?array` — The marketing permissions for the subscriber.
    
</dd>
</dl>

<dl>
<dd>

**$mergeFields:** `?array` — A dictionary of merge fields where the keys are the merge tags. See the [Merge Fields documentation](https://mailchimp.com/developer/marketing/docs/merge-fields/#structure) for more about the structure.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `string` — Subscriber's current status.
    
</dd>
</dl>

<dl>
<dd>

**$tags:** `?array` — The tags that are associated with a member.
    
</dd>
</dl>

<dl>
<dd>

**$timestampOpt:** `string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$timestampSignup:** `string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$vip:** `?bool` — [VIP status](https://mailchimp.com/help/designate-and-send-to-vip-contacts/) for subscriber.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;getMember($listId, $subscriberHash, $request) -> ?ListMembers</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific list member, including a currently subscribed, unsubscribed, or bounced member.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->getMember(
    'list_id',
    'subscriber_hash',
    new GetMemberListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;upsertMember($listId, $subscriberHash, $request) -> ?ListMembers</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add or update a list member.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->upsertMember(
    'list_id',
    'subscriber_hash',
    new UpsertMemberListsRequest([
        'emailAddress' => 'email_address',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
    
</dd>
</dl>

<dl>
<dd>

**$skipMergeValidation:** `?bool` — If skip_merge_validation is true, member data will be accepted without merge field values, even if the merge field is usually required. This defaults to false.
    
</dd>
</dl>

<dl>
<dd>

**$emailAddress:** `string` — Email address for a subscriber. This value is required only if the email address is not already present on the list.
    
</dd>
</dl>

<dl>
<dd>

**$emailType:** `?string` — Type of email this member asked to get ('html' or 'text').
    
</dd>
</dl>

<dl>
<dd>

**$interests:** `?array` — The key of this object's properties is the ID of the interest in question.
    
</dd>
</dl>

<dl>
<dd>

**$ipOpt:** `?string` — The IP address the subscriber used to confirm their opt-in status.
    
</dd>
</dl>

<dl>
<dd>

**$ipSignup:** `?string` — IP address the subscriber signed up from.
    
</dd>
</dl>

<dl>
<dd>

**$language:** `?string` — If set/detected, the [subscriber's language](https://mailchimp.com/help/view-and-edit-contact-languages/).
    
</dd>
</dl>

<dl>
<dd>

**$location:** `?UpsertMemberListsRequestLocation` — Subscriber location information.
    
</dd>
</dl>

<dl>
<dd>

**$marketingPermissions:** `?array` — The marketing permissions for the subscriber.
    
</dd>
</dl>

<dl>
<dd>

**$mergeFields:** `?array` — A dictionary of merge fields where the keys are the merge tags. See the [Merge Fields documentation](https://mailchimp.com/developer/marketing/docs/merge-fields/#structure) for more about the structure.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Subscriber's current status.
    
</dd>
</dl>

<dl>
<dd>

**$statusIfNew:** `?string` — Subscriber's status. This value is required only if the email address is not already present on the list.
    
</dd>
</dl>

<dl>
<dd>

**$tags:** `?array` — The tags that are associated with a member.
    
</dd>
</dl>

<dl>
<dd>

**$timestampOpt:** `string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$timestampSignup:** `string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$vip:** `?bool` — [VIP status](https://mailchimp.com/help/designate-and-send-to-vip-contacts/) for subscriber.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;deleteMember($listId, $subscriberHash)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Archive a list member. To permanently delete, use the delete-permanent action.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->deleteMember(
    'list_id',
    'subscriber_hash',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;updateMember($listId, $subscriberHash, $request) -> ?ListMembers</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update information for a specific list member.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->updateMember(
    'list_id',
    'subscriber_hash',
    new UpdateMemberListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
    
</dd>
</dl>

<dl>
<dd>

**$skipMergeValidation:** `?bool` — If skip_merge_validation is true, member data will be accepted without merge field values, even if the merge field is usually required. This defaults to false.
    
</dd>
</dl>

<dl>
<dd>

**$emailAddress:** `?string` — Email address for a subscriber.
    
</dd>
</dl>

<dl>
<dd>

**$emailType:** `?string` — Type of email this member asked to get ('html' or 'text').
    
</dd>
</dl>

<dl>
<dd>

**$interests:** `?array` — The key of this object's properties is the ID of the interest in question.
    
</dd>
</dl>

<dl>
<dd>

**$ipOpt:** `?string` — The IP address the subscriber used to confirm their opt-in status.
    
</dd>
</dl>

<dl>
<dd>

**$ipSignup:** `?string` — IP address the subscriber signed up from.
    
</dd>
</dl>

<dl>
<dd>

**$language:** `?string` — If set/detected, the [subscriber's language](https://mailchimp.com/help/view-and-edit-contact-languages/).
    
</dd>
</dl>

<dl>
<dd>

**$location:** `?UpdateMemberListsRequestLocation` — Subscriber location information.
    
</dd>
</dl>

<dl>
<dd>

**$marketingPermissions:** `?array` — The marketing permissions for the subscriber.
    
</dd>
</dl>

<dl>
<dd>

**$mergeFields:** `?array` — A dictionary of merge fields where the keys are the merge tags. See the [Merge Fields documentation](https://mailchimp.com/developer/marketing/docs/merge-fields/#structure) for more about the structure.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Subscriber's current status.
    
</dd>
</dl>

<dl>
<dd>

**$timestampOpt:** `string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$timestampSignup:** `string|null` 
    
</dd>
</dl>

<dl>
<dd>

**$vip:** `?bool` — [VIP status](https://mailchimp.com/help/designate-and-send-to-vip-contacts/) for subscriber.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;createMemberActionDeletePermanent($listId, $subscriberHash)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete all personally identifiable information related to a list member, and remove them from a list. This will make it impossible to re-import the list member.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->createMemberActionDeletePermanent(
    'list_id',
    'subscriber_hash',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;listMemberActivity($listId, $subscriberHash, $request) -> ?ListMemberActivityListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get the last 50 events of a member's activity on a specific list, including opens, clicks, and unsubscribes.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->listMemberActivity(
    'list_id',
    'subscriber_hash',
    new ListMemberActivityListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$action:** `?string` — A comma seperated list of actions to return.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;listMemberActivityFeed($listId, $subscriberHash, $request) -> ?ListMemberActivityFeedListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a member's activity on a specific list, including opens, clicks, and unsubscribes.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->listMemberActivityFeed(
    'list_id',
    'subscriber_hash',
    new ListMemberActivityFeedListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$activityFilters:** `?string` — A comma-separated list of activity filters that correspond to a set of activity types, e.g "?activity_filters=open,bounce,click".
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;listMemberEvents($listId, $subscriberHash, $request) -> ?ListMemberEventsListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get events for a contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->listMemberEvents(
    'list_id',
    'subscriber_hash',
    new ListMemberEventsListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;createMemberEvent($listId, $subscriberHash, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add an event for a list member.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->createMemberEvent(
    'list_id',
    'subscriber_hash',
    new CreateMemberEventListsRequest([
        'name' => 'name',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
    
</dd>
</dl>

<dl>
<dd>

**$isSyncing:** `?bool` — Events created with the is_syncing value set to `true` will not trigger automations.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — The name for this type of event ('purchased', 'visited', etc). Must be 2-30 characters in length
    
</dd>
</dl>

<dl>
<dd>

**$occurredAt:** `?DateTime` — The date and time the event occurred in ISO 8601 format.
    
</dd>
</dl>

<dl>
<dd>

**$properties:** `?array` — An optional list of properties
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;listMemberGoals($listId, $subscriberHash, $request) -> ?ListMemberGoalsListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get the last 50 Goal events for a member on a specific list.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->listMemberGoals(
    'list_id',
    'subscriber_hash',
    new ListMemberGoalsListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;listMemberNotes($listId, $subscriberHash, $request) -> ?ListMemberNotesListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get recent notes for a specific list member.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->listMemberNotes(
    'list_id',
    'subscriber_hash',
    new ListMemberNotesListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address.
    
</dd>
</dl>

<dl>
<dd>

**$sortField:** `?string` — Returns notes sorted by the specified field.
    
</dd>
</dl>

<dl>
<dd>

**$sortDir:** `?string` — Determines the order direction for sorted results.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;createMemberNote($listId, $subscriberHash, $request) -> ?MemberNotes</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add a new note for a specific subscriber.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->createMemberNote(
    'list_id',
    'subscriber_hash',
    new CreateMemberNoteListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address.
    
</dd>
</dl>

<dl>
<dd>

**$note:** `?string` — The content of the note. Note length is limited to 1,000 characters.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;getMemberNote($listId, $subscriberHash, $noteId, $request) -> ?MemberNotes</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a specific note for a specific list member.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->getMemberNote(
    'list_id',
    'subscriber_hash',
    'note_id',
    new GetMemberNoteListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
    
</dd>
</dl>

<dl>
<dd>

**$noteId:** `string` — The id for the note.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;deleteMemberNote($listId, $subscriberHash, $noteId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a specific note for a specific list member.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->deleteMemberNote(
    'list_id',
    'subscriber_hash',
    'note_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
    
</dd>
</dl>

<dl>
<dd>

**$noteId:** `string` — The id for the note.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;updateMemberNote($listId, $subscriberHash, $noteId, $request) -> ?MemberNotes</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a specific note for a specific list member.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->updateMemberNote(
    'list_id',
    'subscriber_hash',
    'note_id',
    new UpdateMemberNoteListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
    
</dd>
</dl>

<dl>
<dd>

**$noteId:** `string` — The id for the note.
    
</dd>
</dl>

<dl>
<dd>

**$note:** `?string` — The content of the note. Note length is limited to 1,000 characters.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;listMemberTags($listId, $subscriberHash, $request) -> ?ListMemberTagsListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get the tags on a list member.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->listMemberTags(
    'list_id',
    'subscriber_hash',
    new ListMemberTagsListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;createMemberTag($listId, $subscriberHash, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add or remove tags from a list member. If a tag that does not exist is passed in and set as 'active', a new tag will be created.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->createMemberTag(
    'list_id',
    'subscriber_hash',
    new CreateMemberTagListsRequest([
        'tags' => [
            new CreateMemberTagListsRequestTagsItem([
                'name' => 'name',
                'status' => CreateMemberTagListsRequestTagsItemStatus::Inactive->value,
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address.
    
</dd>
</dl>

<dl>
<dd>

**$isSyncing:** `?bool` — When is_syncing is true, automations based on the tags in the request will not fire
    
</dd>
</dl>

<dl>
<dd>

**$tags:** `array` — A list of tags assigned to the list member.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;listMergeFields($listId, $request) -> ?ListMergeFieldsListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a list of all merge fields for an audience.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->listMergeFields(
    'list_id',
    new ListMergeFieldsListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — The merge field type.
    
</dd>
</dl>

<dl>
<dd>

**$required:** `?bool` — Whether it's a required merge field.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;createMergeField($listId, $request) -> ?MergeField</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add a new merge field for a specific audience.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->createMergeField(
    'list_id',
    new CreateMergeFieldListsRequest([
        'name' => 'name',
        'type' => CreateMergeFieldListsRequestType::Text->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$defaultValue:** `?string` — The default value for the merge field if `null`.
    
</dd>
</dl>

<dl>
<dd>

**$displayOrder:** `?int` — The order that the merge field displays on the list signup form.
    
</dd>
</dl>

<dl>
<dd>

**$helpText:** `?string` — Extra text to help the subscriber fill out the form.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — The name of the merge field (audience field).
    
</dd>
</dl>

<dl>
<dd>

**$options:** `?CreateMergeFieldListsRequestOptions` — Extra options for some merge field types.
    
</dd>
</dl>

<dl>
<dd>

**$public_:** `?bool` — Whether the merge field is displayed on the signup form.
    
</dd>
</dl>

<dl>
<dd>

**$required:** `?bool` — Whether the merge field is required to import a contact.
    
</dd>
</dl>

<dl>
<dd>

**$tag:** `?string` — The merge tag used for Mailchimp campaigns and [adding contact information](https://mailchimp.com/developer/marketing/docs/merge-fields/#add-merge-data-to-contacts).
    
</dd>
</dl>

<dl>
<dd>

**$type:** `string` — The [type](https://mailchimp.com/developer/marketing/docs/merge-fields/#structure) for the merge field.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;getMergeField($listId, $mergeId, $request) -> ?MergeField</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific merge field.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->getMergeField(
    'list_id',
    'merge_id',
    new GetMergeFieldListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$mergeId:** `string` — The id for the merge field.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;deleteMergeField($listId, $mergeId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a specific merge field.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->deleteMergeField(
    'list_id',
    'merge_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$mergeId:** `string` — The id for the merge field.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;updateMergeField($listId, $mergeId, $request) -> ?MergeField</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a specific merge field.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->updateMergeField(
    'list_id',
    'merge_id',
    new UpdateMergeFieldListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$mergeId:** `string` — The id for the merge field.
    
</dd>
</dl>

<dl>
<dd>

**$defaultValue:** `?string` — The default value for the merge field if `null`.
    
</dd>
</dl>

<dl>
<dd>

**$displayOrder:** `?int` — The order that the merge field displays on the list signup form.
    
</dd>
</dl>

<dl>
<dd>

**$helpText:** `?string` — Extra text to help the subscriber fill out the form.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — The name of the merge field (audience field).
    
</dd>
</dl>

<dl>
<dd>

**$options:** `?UpdateMergeFieldListsRequestOptions` — Extra options for some merge field types.
    
</dd>
</dl>

<dl>
<dd>

**$public_:** `?bool` — Whether the merge field is displayed on the signup form.
    
</dd>
</dl>

<dl>
<dd>

**$required:** `?bool` — Whether the merge field is required to import a contact.
    
</dd>
</dl>

<dl>
<dd>

**$tag:** `?string` — The merge tag used for Mailchimp campaigns and [adding contact information](https://mailchimp.com/developer/marketing/docs/merge-fields/#add-merge-data-to-contacts).
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;listSegments($listId, $request) -> ?ListSegmentsListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about all available segments for a specific list.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->listSegments(
    'list_id',
    new ListSegmentsListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — Limit results based on segment type.
    
</dd>
</dl>

<dl>
<dd>

**$sinceCreatedAt:** `?string` — Restrict results to segments created after the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$beforeCreatedAt:** `?string` — Restrict results to segments created before the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$includeCleaned:** `?bool` — Include cleaned members in response
    
</dd>
</dl>

<dl>
<dd>

**$includeTransactional:** `?bool` — Include transactional members in response
    
</dd>
</dl>

<dl>
<dd>

**$includeUnsubscribed:** `?bool` — Include unsubscribed members in response
    
</dd>
</dl>

<dl>
<dd>

**$sinceUpdatedAt:** `?string` — Restrict results to segments update after the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$beforeUpdatedAt:** `?string` — Restrict results to segments update before the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$excludeType:** `?string` — Exclude results based on segment type. For example, use `exclude_type=static` to exclude tags from the response.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;createSegment($listId, $request) -> ?List_</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new segment in a specific list.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->createSegment(
    'list_id',
    new CreateSegmentListsRequest([
        'name' => 'name',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — The name of the segment.
    
</dd>
</dl>

<dl>
<dd>

**$options:** `?CreateSegmentListsRequestOptions` — The [conditions of the segment](https://mailchimp.com/help/save-and-manage-segments/). Static and fuzzy segments don't have conditions.
    
</dd>
</dl>

<dl>
<dd>

**$staticSegment:** `?array` — An array of emails to be used for a static segment. Any emails provided that are not present on the list will be ignored. Passing an empty array will create a static segment without any subscribers. This field cannot be provided with the options field.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;getSegment($listId, $segmentId, $request) -> ?List_</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific segment.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->getSegment(
    'list_id',
    'segment_id',
    new GetSegmentListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$segmentId:** `string` — The unique id for the segment.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$includeCleaned:** `?bool` — Include cleaned members in response
    
</dd>
</dl>

<dl>
<dd>

**$includeTransactional:** `?bool` — Include transactional members in response
    
</dd>
</dl>

<dl>
<dd>

**$includeUnsubscribed:** `?bool` — Include unsubscribed members in response
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;batchAddOrRemoveMembers($listId, $segmentId, $request) -> ?BatchAddOrRemoveMembersListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Batch add/remove list members to static segment
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->batchAddOrRemoveMembers(
    'list_id',
    'segment_id',
    new BatchAddOrRemoveMembersListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$segmentId:** `string` — The unique id for the segment.
    
</dd>
</dl>

<dl>
<dd>

**$membersToAdd:** `?array` — An array of emails to be used for a static segment. Any emails provided that are not present on the list will be ignored. A maximum of 500 members can be sent.
    
</dd>
</dl>

<dl>
<dd>

**$membersToRemove:** `?array` — An array of emails to be used for a static segment. Any emails provided that are not present on the list will be ignored. A maximum of 500 members can be sent.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;deleteSegment($listId, $segmentId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a specific segment in a list.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->deleteSegment(
    'list_id',
    'segment_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$segmentId:** `string` — The unique id for the segment.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;updateSegment($listId, $segmentId, $request) -> ?List_</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a specific segment in a list.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->updateSegment(
    'list_id',
    'segment_id',
    new UpdateSegmentListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$segmentId:** `string` — The unique id for the segment.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — The name of the segment.
    
</dd>
</dl>

<dl>
<dd>

**$options:** `?UpdateSegmentListsRequestOptions` — The [conditions of the segment](https://mailchimp.com/help/save-and-manage-segments/). Static and fuzzy segments don't have conditions.
    
</dd>
</dl>

<dl>
<dd>

**$staticSegment:** `?array` — An array of emails to be used for a static segment. Any emails provided that are not present on the list will be ignored. Passing an empty array for an existing static segment will reset that segment and remove all members. This field cannot be provided with the `options` field.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;listSegmentMembers($listId, $segmentId, $request) -> ?ListSegmentMembersListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about members in a saved segment.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->listSegmentMembers(
    'list_id',
    'segment_id',
    new ListSegmentMembersListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$segmentId:** `string` — The unique id for the segment.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$includeCleaned:** `?bool` — Include cleaned members in response
    
</dd>
</dl>

<dl>
<dd>

**$includeTransactional:** `?bool` — Include transactional members in response
    
</dd>
</dl>

<dl>
<dd>

**$includeUnsubscribed:** `?bool` — Include unsubscribed members in response
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;createSegmentMember($listId, $segmentId, $request) -> ?ListsSegmentsMembers</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add a member to a static segment.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->createSegmentMember(
    'list_id',
    'segment_id',
    new CreateSegmentMemberListsRequest([
        'emailAddress' => 'email_address',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$segmentId:** `string` — The unique id for the segment.
    
</dd>
</dl>

<dl>
<dd>

**$emailAddress:** `string` — Email address for a subscriber.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;deleteSegmentMember($listId, $segmentId, $subscriberHash)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Remove a member from the specified static segment.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->deleteSegmentMember(
    'list_id',
    'segment_id',
    'subscriber_hash',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$segmentId:** `string` — The unique id for the segment.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;listSignupForms($listId) -> ?ListSignupFormsListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get signup forms for a specific list.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->listSignupForms(
    'list_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;createSignupForm($listId, $request) -> ?SignupForm</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Customize a list's default signup form.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->createSignupForm(
    'list_id',
    new CreateSignupFormListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$contents:** `?array` — The signup form body content.
    
</dd>
</dl>

<dl>
<dd>

**$header:** `?CreateSignupFormListsRequestHeader` — Options for customizing your signup form header.
    
</dd>
</dl>

<dl>
<dd>

**$styles:** `?array` — An array of objects, each representing an element style for the signup form.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;listSurveys($listId) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about all available surveys for a specific list.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->listSurveys(
    'list_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;createSurvey($listId, $request) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a draft survey for an audience.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->createSurvey(
    'list_id',
    new CreateSurveyListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$title:** `?string` — The title of the survey.
    
</dd>
</dl>

<dl>
<dd>

**$sections:** `?array` — Initial survey sections.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;getSurvey($listId, $surveyId) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get details about a specific survey.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->getSurvey(
    'list_id',
    'survey_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$surveyId:** `string` — The ID of the survey.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;deleteSurvey($listId, $surveyId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a survey.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->deleteSurvey(
    'list_id',
    'survey_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$surveyId:** `string` — The ID of the survey.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;updateSurvey($listId, $surveyId, $request) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a survey. When sections is provided, send the complete section list in display order. Any existing section not included is deleted.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->updateSurvey(
    'list_id',
    'survey_id',
    new UpdateSurveyListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$surveyId:** `string` — The ID of the survey.
    
</dd>
</dl>

<dl>
<dd>

**$title:** `?string` — The title of the survey.
    
</dd>
</dl>

<dl>
<dd>

**$isPipedToInbox:** `?bool` — Whether responses are sent to Mailchimp Inbox.
    
</dd>
</dl>

<dl>
<dd>

**$sections:** `?array` — The complete survey section list in display order. On update, sections omitted from this array are deleted. Include section id to update an existing section; omit section id to add a new section.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;createListSurveyActionReplicate($listIdPathParam, $surveyId, $request) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Replicate a survey.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->createListSurveyActionReplicate(
    'list_id',
    'survey_id',
    new CreateListSurveyActionReplicateListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listIdPathParam:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$surveyId:** `string` — The ID of the survey.
    
</dd>
</dl>

<dl>
<dd>

**$title:** `?string` — The title for the replicated survey.
    
</dd>
</dl>

<dl>
<dd>

**$listId:** `?string` — The unique ID of the audience for the replicated survey. Defaults to the source survey audience.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;listTagSearch($listId, $request) -> ?ListTagSearchListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Search for tags on a list by name. If no name is provided, will return all tags on the list.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->listTagSearch(
    'list_id',
    new ListTagSearchListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — The search query used to filter tags.  The search query will be compared to each tag as a prefix, so all tags that have a name starting with this field will be returned.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;listWebhooks($listId) -> ?ListWebhooksListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about all webhooks for a specific list.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->listWebhooks(
    'list_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;createWebhook($listId, $request) -> ?ListWebhooks</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new webhook for a specific list.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->createWebhook(
    'list_id',
    new CreateWebhookListsRequest([
        'body' => new AddWebhook([]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$request:** `AddWebhook` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;getWebhook($listId, $webhookId) -> ?ListWebhooks</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific webhook.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->getWebhook(
    'list_id',
    'webhook_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$webhookId:** `string` — The webhook's id.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;deleteWebhook($listId, $webhookId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a specific webhook in a list.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->deleteWebhook(
    'list_id',
    'webhook_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$webhookId:** `string` — The webhook's id.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;updateWebhook($listId, $webhookId, $request) -> ?ListWebhooks</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update the settings for an existing webhook.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->updateWebhook(
    'list_id',
    'webhook_id',
    new UpdateWebhookListsRequest([
        'body' => new AddWebhook([]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$webhookId:** `string` — The webhook's id.
    
</dd>
</dl>

<dl>
<dd>

**$request:** `AddWebhook` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## surveys
<details><summary><code>$client-&gt;surveys-&gt;createListSurveyActionCreateEmail($listId, $surveyId) -> ?Campaign</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Utilize the List ID and Survey ID to generate a Campaign that links to your survey.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->surveys->createListSurveyActionCreateEmail(
    'list_id',
    'survey_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$surveyId:** `string` — The ID of the survey.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;surveys-&gt;createListSurveyActionPublish($listId, $surveyId) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Publish a survey that is in draft, unpublished, or has been previously published and edited.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->surveys->createListSurveyActionPublish(
    'list_id',
    'survey_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$surveyId:** `string` — The ID of the survey.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;surveys-&gt;createListSurveyActionUnpublish($listId, $surveyId) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Unpublish a survey that has been published.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->surveys->createListSurveyActionUnpublish(
    'list_id',
    'survey_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — The unique ID for the list.
    
</dd>
</dl>

<dl>
<dd>

**$surveyId:** `string` — The ID of the survey.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## ping
<details><summary><code>$client-&gt;ping-&gt;list() -> ?ListPingResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

A health check for the API that won't return any account-specific information.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ping->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## reporting
<details><summary><code>$client-&gt;reporting-&gt;list() -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about the reporting endpoint's resources.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reporting->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reporting-&gt;listFacebookAds($request) -> ?ListFacebookAdsReportingResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get reports of Facebook ads.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reporting->listFacebookAds(
    new ListFacebookAdsReportingRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$sortField:** `?string` — Returns files sorted by the specified field.
    
</dd>
</dl>

<dl>
<dd>

**$sortDir:** `?string` — Determines the order direction for sorted results.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reporting-&gt;getFacebookAd($outreachId, $request) -> ?ReportingFacebookAd</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get report of a Facebook ad.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reporting->getFacebookAd(
    'outreach_id',
    new GetFacebookAdReportingRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$outreachId:** `string` — The outreach id.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reporting-&gt;listFacebookAdEcommerceProductActivity($outreachId, $request) -> ?ListFacebookAdEcommerceProductActivityReportingResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get breakdown of product activity for an outreach.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reporting->listFacebookAdEcommerceProductActivity(
    'outreach_id',
    new ListFacebookAdEcommerceProductActivityReportingRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$outreachId:** `string` — The outreach id.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$sortField:** `?string` — Returns files sorted by the specified field.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reporting-&gt;listLandingPages($request) -> ?ListLandingPagesReportingResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get reports of landing pages.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reporting->listLandingPages(
    new ListLandingPagesReportingRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reporting-&gt;getLandingPage($outreachId, $request) -> ?LandingPageReport</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get report of a landing page.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reporting->getLandingPage(
    'outreach_id',
    new GetLandingPageReportingRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$outreachId:** `string` — The outreach id.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reporting-&gt;listSurveys($request) -> ?ListSurveysReportingResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get reports for surveys.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reporting->listSurveys(
    new ListSurveysReportingRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reporting-&gt;getSurvey($surveyId, $request) -> ?GetSurveyReportingResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get report for a survey.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reporting->getSurvey(
    'survey_id',
    new GetSurveyReportingRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$surveyId:** `string` — The ID of the survey.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reporting-&gt;listSurveyQuestions($surveyId, $request) -> ?ListSurveyQuestionsReportingResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get reports for survey questions.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reporting->listSurveyQuestions(
    'survey_id',
    new ListSurveyQuestionsReportingRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$surveyId:** `string` — The ID of the survey.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reporting-&gt;getSurveyQuestion($surveyId, $questionId, $request) -> ?SurveyQuestionReport</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get report for a survey question.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reporting->getSurveyQuestion(
    'survey_id',
    'question_id',
    new GetSurveyQuestionReportingRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$surveyId:** `string` — The ID of the survey.
    
</dd>
</dl>

<dl>
<dd>

**$questionId:** `string` — The ID of the survey question.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reporting-&gt;listSurveyQuestionAnswers($surveyId, $questionId, $request) -> ?ListSurveyQuestionAnswersReportingResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get answers for a survey question.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reporting->listSurveyQuestionAnswers(
    'survey_id',
    'question_id',
    new ListSurveyQuestionAnswersReportingRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$surveyId:** `string` — The ID of the survey.
    
</dd>
</dl>

<dl>
<dd>

**$questionId:** `string` — The ID of the survey question.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$respondentFamiliarityIs:** `?string` — Filter survey responses by familiarity of the respondents.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reporting-&gt;listSurveyResponses($surveyId, $request) -> ?ListSurveyResponsesReportingResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get responses to a survey.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reporting->listSurveyResponses(
    'survey_id',
    new ListSurveyResponsesReportingRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$surveyId:** `string` — The ID of the survey.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$answeredQuestion:** `?int` — The ID of the question that was answered.
    
</dd>
</dl>

<dl>
<dd>

**$choseAnswer:** `?string` — The ID of the option chosen to filter responses on.
    
</dd>
</dl>

<dl>
<dd>

**$respondentFamiliarityIs:** `?string` — Filter survey responses by familiarity of the respondents.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reporting-&gt;getSurveyRespons($surveyId, $responseId) -> ?GetSurveyResponsReportingResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a single survey response.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reporting->getSurveyRespons(
    'survey_id',
    'response_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$surveyId:** `string` — The ID of the survey.
    
</dd>
</dl>

<dl>
<dd>

**$responseId:** `string` — The ID of the survey response.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## reports
<details><summary><code>$client-&gt;reports-&gt;list($request) -> ?ListReportsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get campaign reports.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reports->list(
    new ListReportsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — The campaign type.
    
</dd>
</dl>

<dl>
<dd>

**$beforeSendTime:** `?DateTime` — Restrict the response to campaigns sent before the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$sinceSendTime:** `?DateTime` — Restrict the response to campaigns sent after the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reports-&gt;get($campaignId, $request) -> ?CampaignReport</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get report details for a specific sent campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reports->get(
    'campaign_id',
    new GetReportsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reports-&gt;listAbuseReports($campaignId, $request) -> ?ListAbuseReportsReportsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a list of abuse complaints for a specific campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reports->listAbuseReports(
    'campaign_id',
    new ListAbuseReportsReportsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reports-&gt;getAbuseReport($campaignId, $reportId, $request) -> ?AbuseComplaint</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific abuse report for a campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reports->getAbuseReport(
    'campaign_id',
    'report_id',
    new GetAbuseReportReportsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$reportId:** `string` — The id for the abuse report.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reports-&gt;listAdvice($campaignId, $request) -> ?ListAdviceReportsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get feedback based on a campaign's statistics. Advice feedback is based on campaign stats like opens, clicks, unsubscribes, bounces, and more.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reports->listAdvice(
    'campaign_id',
    new ListAdviceReportsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reports-&gt;listClickDetails($campaignId, $request) -> ?ListClickDetailsReportsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about clicks on specific links in your Mailchimp campaigns.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reports->listClickDetails(
    'campaign_id',
    new ListClickDetailsReportsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$sortField:** `?string` — Returns click reports sorted by the specified field.
    
</dd>
</dl>

<dl>
<dd>

**$sortDir:** `?string` — Determines the order direction for sorted results.
    
</dd>
</dl>

<dl>
<dd>

**$filterBots:** `?bool` — When true, exclude automated bot clicks so the returned click counts reflect human clicks only, matching the in-app Recipient Activity view. Filtering changes a link's counts, but never removes a link from the response. Defaults to false (all clicks).
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reports-&gt;getClickDetail($campaignId, $linkId, $request) -> ?ClickDetailReport</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get click details for a specific link in a campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reports->getClickDetail(
    'campaign_id',
    'link_id',
    new GetClickDetailReportsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$linkId:** `string` — The id for the link.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$filterBots:** `?bool` — When true, exclude automated bot clicks so the returned click counts reflect human clicks only, matching the in-app Recipient Activity view. Filtering changes a link's counts, but never removes a link from the response. Defaults to false (all clicks).
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reports-&gt;listClickDetailMembers($campaignId, $linkId, $request) -> ?ListClickDetailMembersReportsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about list members who clicked on a specific link in a campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reports->listClickDetailMembers(
    'campaign_id',
    'link_id',
    new ListClickDetailMembersReportsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$linkId:** `string` — The id for the link.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reports-&gt;getClickDetailMember($campaignId, $linkId, $subscriberHash, $request) -> ?ClickDetailMember</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific subscriber who clicked a link in a specific campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reports->getClickDetailMember(
    'campaign_id',
    'link_id',
    'subscriber_hash',
    new GetClickDetailMemberReportsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$linkId:** `string` — The id for the link.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reports-&gt;listDomainPerformance($campaignId, $request) -> ?ListDomainPerformanceReportsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get statistics for the top-performing email domains in a campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reports->listDomainPerformance(
    'campaign_id',
    new ListDomainPerformanceReportsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reports-&gt;listEcommerceProductActivity($campaignId, $request) -> ?ListEcommerceProductActivityReportsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get breakdown of product activity for a campaign
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reports->listEcommerceProductActivity(
    'campaign_id',
    new ListEcommerceProductActivityReportsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$sortField:** `?string` — Returns files sorted by the specified field.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reports-&gt;listEepurl($campaignId, $request) -> ?ListEepurlReportsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a summary of social activity for the campaign, tracked by EepURL.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reports->listEepurl(
    'campaign_id',
    new ListEepurlReportsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reports-&gt;listEmailActivity($campaignId, $request) -> ?ListEmailActivityReportsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a list of member's subscriber activity in a specific campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reports->listEmailActivity(
    'campaign_id',
    new ListEmailActivityReportsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$since:** `?string` — Restrict results to email activity events that occur after a specific time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$filterBots:** `?bool` — When true, exclude automated bot and Apple Mail Privacy Protection (MPP) proxy activity so the returned activity reflects human-only opens and clicks, matching the in-app Recipient Activity view. Filtering removes events from a member's activity, but never removes the member from the response. Defaults to false (all activity).
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reports-&gt;getEmailActivity($campaignId, $subscriberHash, $request) -> ?EmailActivity</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a specific list member's activity in a campaign including opens, clicks, and bounces.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reports->getEmailActivity(
    'campaign_id',
    'subscriber_hash',
    new GetEmailActivityReportsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$since:** `?string` — Restrict results to email activity events that occur after a specific time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$filterBots:** `?bool` — When true, exclude automated bot and Apple Mail Privacy Protection (MPP) proxy activity so the returned activity reflects human-only opens and clicks, matching the in-app Recipient Activity view. Filtering removes events from a member's activity, but never removes the member from the response. Defaults to false (all activity).
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reports-&gt;listLocations($campaignId, $request) -> ?ListLocationsReportsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get top open locations for a specific campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reports->listLocations(
    'campaign_id',
    new ListLocationsReportsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reports-&gt;listOpenDetails($campaignId, $request) -> ?ListOpenDetailsReportsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get detailed information about any campaign emails that were opened by a list member.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reports->listOpenDetails(
    'campaign_id',
    new ListOpenDetailsReportsRequest([
        'since' => '2016-04-12 12:00:00',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$since:** `?string` — Restrict results to campaign open events that occur after a specific time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$sortField:** `?string` — Returns open reports sorted by the specified field.
    
</dd>
</dl>

<dl>
<dd>

**$sortDir:** `?string` — Determines the order direction for sorted results.
    
</dd>
</dl>

<dl>
<dd>

**$filterBots:** `?bool` — When true, exclude automated (proxy/bot) opens so the returned open counts reflect human opens only, matching the in-app Recipient Activity view. A member whose opens are all automated is excluded from the human-only view. Defaults to false (all opens).
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reports-&gt;getOpenDetail($campaignId, $subscriberHash, $request) -> ?OpenActivity</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific subscriber who opened a campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reports->getOpenDetail(
    'campaign_id',
    'subscriber_hash',
    new GetOpenDetailReportsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$filterBots:** `?bool` — When true, exclude automated (proxy/bot) opens so the returned open counts reflect human opens only, matching the in-app Recipient Activity view. A member whose opens are all automated is excluded from the human-only view. Defaults to false (all opens).
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reports-&gt;listSentTo($campaignId, $request) -> ?ListSentToReportsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about campaign recipients.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reports->listSentTo(
    'campaign_id',
    new ListSentToReportsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reports-&gt;getSentTo($campaignId, $subscriberHash, $request) -> ?SentTo</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific campaign recipient.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reports->getSentTo(
    'campaign_id',
    'subscriber_hash',
    new GetSentToReportsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reports-&gt;listSubReports($campaignId, $request) -> ?ListSubReportsReportsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a list of reports with child campaigns for a specific parent campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reports->listSubReports(
    'campaign_id',
    new ListSubReportsReportsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reports-&gt;listUnsubscribed($campaignId, $request) -> ?ListUnsubscribedReportsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about members who have unsubscribed from a specific campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reports->listUnsubscribed(
    'campaign_id',
    new ListUnsubscribedReportsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;reports-&gt;getUnsubscribed($campaignId, $subscriberHash, $request) -> ?Unsubscribes</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific list member who unsubscribed from a campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->reports->getUnsubscribed(
    'campaign_id',
    'subscriber_hash',
    new GetUnsubscribedReportsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — The unique id for the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberHash:** `string` — The MD5 hash of the lowercase version of the list member's email address.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## SearchCampaigns
<details><summary><code>$client-&gt;searchCampaigns-&gt;list($request) -> ?ListSearchCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Search all campaigns for the specified query terms.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->searchCampaigns->list(
    new ListSearchCampaignsRequest([
        'query' => 'query',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$query:** `string` — The search query used to filter results.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## SmsCampaigns
<details><summary><code>$client-&gt;smsCampaigns-&gt;list($request) -> ?ListSmsCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get all SMS campaigns in an account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->smsCampaigns->list(
    new ListSmsCampaignsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;smsCampaigns-&gt;create($request) -> ?SmsCampaign</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new SMS campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->smsCampaigns->create(
    new CreateSmsCampaignsRequest([
        'name' => 'name',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `string` — The name of the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$listId:** `?int` — The numeric ID of the list to send the campaign to.
    
</dd>
</dl>

<dl>
<dd>

**$folderId:** `?string` — The ID of the folder to place this campaign in.
    
</dd>
</dl>

<dl>
<dd>

**$segments:** `?array` — The segment IDs to target for this campaign.
    
</dd>
</dl>

<dl>
<dd>

**$excludedSegments:** `?array` — The segment IDs to exclude from this campaign.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;smsCampaigns-&gt;get($smsCampaignId, $request) -> ?SmsCampaign</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get the details for a single SMS campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->smsCampaigns->get(
    'sms_campaign_id',
    new GetSmsCampaignsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$smsCampaignId:** `string` — The unique id for the SMS campaign.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;smsCampaigns-&gt;delete($smsCampaignId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Remove a campaign from your Mailchimp account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->smsCampaigns->delete(
    'sms_campaign_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$smsCampaignId:** `string` — The unique id for the SMS campaign.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;smsCampaigns-&gt;update($smsCampaignId, $request) -> ?SmsCampaign</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update an SMS campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->smsCampaigns->update(
    'sms_campaign_id',
    new UpdateSmsCampaignsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$smsCampaignId:** `string` — The unique id for the SMS campaign.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — The name of the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$folderId:** `?string` — The ID of the folder to place this campaign in.
    
</dd>
</dl>

<dl>
<dd>

**$segments:** `?array` — The segment IDs to target for this campaign.
    
</dd>
</dl>

<dl>
<dd>

**$excludedSegments:** `?array` — The segment IDs to exclude from this campaign.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;smsCampaigns-&gt;createActionCancelSend($smsCampaignId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Cancel a scheduled or sending SMS campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->smsCampaigns->createActionCancelSend(
    'sms_campaign_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$smsCampaignId:** `string` — The unique id for the SMS campaign.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;smsCampaigns-&gt;createActionSchedule($smsCampaignId, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Schedule an SMS campaign for delivery.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->smsCampaigns->createActionSchedule(
    'sms_campaign_id',
    new CreateActionScheduleSmsCampaignsRequest([
        'scheduleTime' => new DateTime('2024-01-15T09:30:00Z'),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$smsCampaignId:** `string` — The unique id for the SMS campaign.
    
</dd>
</dl>

<dl>
<dd>

**$scheduleTime:** `DateTime` — The UTC date and time to schedule the campaign.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;smsCampaigns-&gt;createActionSend($smsCampaignId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Send an SMS campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->smsCampaigns->createActionSend(
    'sms_campaign_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$smsCampaignId:** `string` — The unique id for the SMS campaign.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;smsCampaigns-&gt;getContent($smsCampaignId, $request) -> ?SmsCampaignContent</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get the content for an SMS campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->smsCampaigns->getContent(
    'sms_campaign_id',
    new GetContentSmsCampaignsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$smsCampaignId:** `string` — The unique id for the SMS campaign.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;smsCampaigns-&gt;upsertContent($smsCampaignId, $request) -> ?SmsCampaignContent</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Set the content for an SMS campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->smsCampaigns->upsertContent(
    'sms_campaign_id',
    new UpsertContentSmsCampaignsRequest([
        'messageBody' => 'message_body',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$smsCampaignId:** `string` — The unique id for the SMS campaign.
    
</dd>
</dl>

<dl>
<dd>

**$messageBody:** `string` — The SMS message body.
    
</dd>
</dl>

<dl>
<dd>

**$media:** `?array` — Attached images or files. Limited to one item. Omitting this field or sending an empty array removes any existing media; to keep the current media while updating other fields, re-send the media array.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## SearchMembers
<details><summary><code>$client-&gt;searchMembers-&gt;list($request) -> ?ListSearchMembersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Search for list members. This search can be restricted to a specific list, or can be used to search across all lists in an account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->searchMembers->list(
    new ListSearchMembersRequest([
        'query' => 'query',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$query:** `string` — The search query used to filter results. Query should be a valid email, or a string representing a contact's first or last name.
    
</dd>
</dl>

<dl>
<dd>

**$listId:** `?string` — The unique id for the list.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## TemplateFolders
<details><summary><code>$client-&gt;templateFolders-&gt;list($request) -> ?ListTemplateFoldersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get all folders used to organize templates.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->templateFolders->list(
    new ListTemplateFoldersRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;templateFolders-&gt;create($request) -> ?CreateTemplateFoldersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new template folder.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->templateFolders->create(
    new CreateTemplateFoldersRequest([
        'name' => 'name',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `string` — The name of the folder.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;templateFolders-&gt;get($folderId, $request) -> ?GetTemplateFoldersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific folder used to organize templates.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->templateFolders->get(
    'folder_id',
    new GetTemplateFoldersRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$folderId:** `string` — The unique id for the template folder.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;templateFolders-&gt;delete($folderId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a specific template folder, and mark all the templates in the folder as 'unfiled'.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->templateFolders->delete(
    'folder_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$folderId:** `string` — The unique id for the template folder.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;templateFolders-&gt;update($folderId, $request) -> ?UpdateTemplateFoldersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a specific folder used to organize templates.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->templateFolders->update(
    'folder_id',
    new UpdateTemplateFoldersRequest([
        'name' => 'name',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$folderId:** `string` — The unique id for the template folder.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — The name of the folder.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## templates
<details><summary><code>$client-&gt;templates-&gt;list($request) -> ?ListTemplatesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a list of an account's available templates.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->templates->list(
    new ListTemplatesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$count:** `?int` — The number of records to return. Default value is 10. Maximum value is 1000
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
    
</dd>
</dl>

<dl>
<dd>

**$createdBy:** `?string` — The Mailchimp account user who created the template.
    
</dd>
</dl>

<dl>
<dd>

**$sinceDateCreated:** `?string` — Restrict the response to templates created after the set date. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$beforeDateCreated:** `?string` — Restrict the response to templates created before the set date. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — Limit results based on template type.
    
</dd>
</dl>

<dl>
<dd>

**$category:** `?string` — Limit results based on category.
    
</dd>
</dl>

<dl>
<dd>

**$folderId:** `?string` — The unique folder id.
    
</dd>
</dl>

<dl>
<dd>

**$sortField:** `?string` — Returns user templates sorted by the specified field.
    
</dd>
</dl>

<dl>
<dd>

**$contentType:** `?string` — Limit results based on how the template's content is put together. Only templates of type `user` can be filtered by `content_type`. If you want to retrieve saved templates created with the legacy email editor, then filter `content_type` to `template`. If you'd rather pull your saved templates for the new editor, filter to `multichannel`. For code your own templates, filter to `html`.
    
</dd>
</dl>

<dl>
<dd>

**$sortDir:** `?string` — Determines the order direction for sorted results.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;templates-&gt;create($request) -> ?TemplateInstance</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new template for the account. Only Classic templates are supported.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->templates->create(
    new CreateTemplatesRequest([
        'html' => 'html',
        'name' => "Freddie's Jokes",
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$folderId:** `?string` — The id of the folder the template is currently in.
    
</dd>
</dl>

<dl>
<dd>

**$html:** `string` — The raw HTML for the template. We  support the Mailchimp [Template Language](https://mailchimp.com/help/getting-started-with-mailchimps-template-language/) in any HTML code passed via the API.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — The name of the template.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;templates-&gt;get($templateId, $request) -> ?TemplateInstance</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get information about a specific template.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->templates->get(
    'template_id',
    new GetTemplatesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$templateId:** `string` — The unique id for the template.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;templates-&gt;delete($templateId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a specific template.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->templates->delete(
    'template_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$templateId:** `string` — The unique id for the template.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;templates-&gt;update($templateId, $request) -> ?TemplateInstance</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update the name, HTML, or `folder_id` of an existing template.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->templates->update(
    'template_id',
    new UpdateTemplatesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$templateId:** `string` — The unique id for the template.
    
</dd>
</dl>

<dl>
<dd>

**$folderId:** `?string` — The id of the folder the template is currently in.
    
</dd>
</dl>

<dl>
<dd>

**$html:** `?string` — The raw HTML for the template. We  support the Mailchimp [Template Language](https://mailchimp.com/help/getting-started-with-mailchimps-template-language/) in any HTML code passed via the API.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — The name of the template.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;templates-&gt;listDefaultContent($templateId, $request) -> ?ListDefaultContentTemplatesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get the sections that you can edit in a template, including each section's default content.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->templates->listDefaultContent(
    'template_id',
    new ListDefaultContentTemplatesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$templateId:** `string` — The unique id for the template.
    
</dd>
</dl>

<dl>
<dd>

**$fields:** `?string` — A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>

<dl>
<dd>

**$excludeFields:** `?string` — A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## VerifiedDomains
<details><summary><code>$client-&gt;verifiedDomains-&gt;list() -> ?ListVerifiedDomainsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get all of the sending domains on the account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->verifiedDomains->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;verifiedDomains-&gt;create($request) -> ?CreateVerifiedDomainsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add a domain to the account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->verifiedDomains->create(
    new CreateVerifiedDomainsRequest([
        'verificationEmail' => 'verification_email',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$verificationEmail:** `string` — The e-mail address at the domain you want to verify. This will receive a two-factor challenge to be used in the verify action.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;verifiedDomains-&gt;get($domainName) -> ?GetVerifiedDomainsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get the details for a single domain on the account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->verifiedDomains->get(
    'domain_name',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$domainName:** `string` — The domain name.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;verifiedDomains-&gt;delete($domainName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a verified domain from the account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->verifiedDomains->delete(
    'domain_name',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$domainName:** `string` — The domain name.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;verifiedDomains-&gt;createActionVerify($domainName, $request) -> ?CreateActionVerifyVerifiedDomainsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Verify a domain for sending.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->verifiedDomains->createActionVerify(
    'domain_name',
    new CreateActionVerifyVerifiedDomainsRequest([
        'code' => 'code',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$domainName:** `string` — The domain name.
    
</dd>
</dl>

<dl>
<dd>

**$code:** `string` — The code that was sent to the email address provided when adding a new domain to verify.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

