<h2 align="center">Coding Challenge</h2>
<h3 align="center">Mehrdad's Approach</h3>

<p align="center">A Simple Project To Control Mars Explorer</p>

# Installation

Clone the repository on your local machine
```shell script
    git clone https://github.com/mehrdadmahdian/myhammer-challenge.git
```
Jump to the installation folder
```shell script
    composer install
    composer dump
```
Run the test using 
```shell script
    composer test
```

<!-- USAGE EXAMPLES -->
# Usage

An example of process configuration array is introduced here. This is a process with 3 activities which is not started yet and all activities has null or inactive status.
![alt Simple Process Example](simple.jpg)
Code Client decided where to load configuration. It can be loaded from permanent storage, or it could be loaded statically form a file.
```php
    $configuration = [
       'activities' => [
           [
               'name' => 'act1',
               'sources' => [],
               'targets' => ['act2'],
//               'status'  => ElementInterface::STATUS_INACTIVE,
               'observers' => [ActivitySampleObserver::class],
               'extra-actions' => [
                    SomeActionTypeWhichImplementsActionInterface1::class,
                    SomeActionTypeWhichImplementsActionInterface2::class
                ]           
           ],
           [
               'name' => 'act2',
               'sources' => ['act1'],
               'targets' => ['act3'],
//               'status'  => ElementInterface::STATUS_INACTIVE
           ],
           [
               'name' => 'act3',
               'sources' => ['act2'],
               'targets' => [],
               'status'  => ElementInterface::STATUS_INACTIVE
           ],
       ]
    ];
```

Process model could be built using package built-in facade method.

```php
    use MehrdadMahdian\PhpWorkflowCore\PhpWorkflowCoreFacade;
    $model = PhpWorkflowCoreFacade::buildProcessModel($configuration);
```

## Actions
client could run engine action using built-in facade too:

```php
    use MehrdadMahdian\PhpWorkflowCore\PhpWorkflowCoreFacade;
    $model = PhpWorkflowCoreFacade::runEngineAction($model, $action, $params);
```
after each action type, updated model is accessible. Updated model data must be persisted by client if it is needed.

to find thant which actions each activity has, we can use this code:
```php
    use MehrdadMahdian\PhpWorkflowCore\PhpWorkflowCoreFacade;
    $model = PhpWorkflowCoreFacade::getActivityActions($model, $myActivityKey);
```
it will return list of available actions with their required parameters.


Two built-in actions are supported in this library and each one has its own params.
### Start Action
No Parameter is needed in this type of action
```php
    use MehrdadMahdian\PhpWorkflowCore\PhpWorkflowCoreFacade;
    $model = PhpWorkflowCoreFacade::runEngineAction(
        $model, //suppose that model is defined previously in the code. mdoel is in type of ModelInterface 
        'start'
    );
```

### Transition Action
```php
    use MehrdadMahdian\PhpWorkflowCore\PhpWorkflowCoreFacade;
    $model = PhpWorkflowCoreFacade::runEngineAction(
        $model,
        'transition',
        ['currentActivityKey' => 'act1', 'targetActivityKey' => 'act2']
     );
```

## Extra Actions
Inside of built in actions of workflow core, we can run desired action which is implements `ActionInterface`.
To do that, action class must be fed to `runEngineAction` like this:
```php
    use MehrdadMahdian\PhpWorkflowCore\PhpWorkflowCoreFacade;
    $parameters = [
        //key: //value,
        //key2: //value2,
        ...
    ];         
    $model = PhpWorkflowCoreFacade::runEngineAction(
        $model,
        \Path\To\My\Custom\Action::class,
        $parameters
     );
```

## Observers
No description yet.
