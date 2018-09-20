# Date Filter for Laravel Nova

Nova filter that displays a Date Picker instead of a select.

# Demo

![Demo](http://g.recordit.co/7sG50yEf7O.gif)

# How to use

Just use DateFilter class instead of Filter

```php
use R64\Filters\DateFilter;

class DateFrom extends DateFilter
{
  //
}
```

# Customization

As Date Filter is not a select anymore we can use options method to pass the date picker config

```php
use R64\Filters\DateFilter;

class DateFrom extends DateFilter
{
  //...

  public function options(Request $request)
  {
    return [
      'dateFormat' => 'Y-m-d', // default Y-m-d H:i:S
      'placeholder' => 'My placeholder', // default __('Pick a date')
      'disabled' => true, // default false
      'twelveHourTime' => true, // default false
      'enableTime' => true, // default false
      'enableSeconds' => true, // default false
    ];
  }
}
```
