# Channel Designer

Migration classes have access to Executive's `ChannelDesigner` class. This class is designed to be user friendly and easy to use for anyone. It handles all the heavy lifting of interfacing with EE's models and services to create or update all the things. Here's a brief example of the channel designer in use in a migration class.

```php
<?php

namespace User\Migration;

use BuzzingPixel\Executive\Abstracts\BaseMigration;

/**
 * Class m2017_08_31_151615_ChannelDesignerTest
 */
class m2017_08_31_151615_ChannelDesignerTest extends BaseMigration
{
    /**
     * Run migration
     */
    public function safeUp()
    {
        $this->channelDesigner->fieldGroupName('Test')
            ->addField(array(
                'field_name' => 'test_field_1',
                'field_label' => 'Test Field 1',
                'field_instructions' => 'This is a test field',
                'field_required' => true,
                'field_type' => 'text',
            ))
            ->addField(array(
                'field_name' => 'test_field_2',
                'field_label' => 'Test Field 2',
                'field_instructions' => 'This is another test field',
                'field_type' => 'text',
            ))
            ->channelName('my_test_channel')
            ->channelTitle('My Test Channel')
            ->save();
    }
}
```

## Methods

Each of these methods can be used in conjunction with creating any or all of these items. For instance, if you just want to add new fields to a field group, or update existing fields in a field group, you can do that without using the methods to specify or create a channel.

Each of the methods except `save()` return an instance of the class.

### `siteName('custom_site')`

For MSM sites, if you are manipulating schema for a site other than `default_site`, use this method to set the site name you will be manipulating.

### `statusGroupName('My Status Group')`

The status group to assign to the channel you are creating. Or if that group does not exist, it will be created.

### `addStatus('Custom Stats', '009933')`

Add a status to the specified status group and optionally set the highlight color of that status. If you do not provide the second argument of `$color`, it will default to `'000000'`.

### `fieldGroupName('My Custom Field Group')`

The name of the field group to use or create.

### `addField(array())`

Set the field properties to add or update. The array argument can receive any property on ExpressionEngine's field model. Many third party fields will require specific settings to be added. The only required key for something like a test field is `field_name` although you'll probably want to set a `field_label` too. If you do not provide that, it will default to `field_name`.

### `channelName('my_channel')`

Set the name of the channel to create or update.

### `channelTitle('My Channel')`

Set the title of the channel.

### `extendedChannelProperties(array())`

And array of any properties on the `Channel` model to set or update.

### `save()`

After using all the appropriate methods for the schema additions/changes, use the save method to commit all those changes.
