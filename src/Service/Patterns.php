<?php

namespace App\Service;

// this entity it's only with constants and it includes all the design patterns informations from the site;
// it's design like that because it's a portofolio project;
// it is public on github for download and test;
// it's way easier to test the project with no require of a database;

class Patterns{

    const PATTERNS = [
        1 => [
            'name' => 'Abstract factory',
            'title' => 'Creates Vehicle and Toy products.',
            'type' => 'creational',
            'route' => 'abstract',
            'img' => '/img/abstract.svg',
            'details' => "Abstract Factory is a creational design pattern that lets you produce families of related objects without specifying their concrete classes.",

            'implementation' => 'There are 2 factories (VehicleFactory and ToyFactory) that create 2 types of different concrete classes (one type implements VehicleInterface and the other implements ToyInterface). So, to create the object, client uses AbstractFactory class which contains the logic to select the specified factory.'
        ],
        2 => [
            'name' => 'Factory method',
            'title' => 'Create Vehicles products.',
            'type' => 'creational',
            'route' => 'factory',
            'img' => '/img/factory.svg',
            'details' => "Factory Method is a creational design pattern that provides an interface for creating objects in a superclass, but allows subclasses to alter the type of objects that will be created.",
            'implementation' => "There it's a class (Creator) that creates different class objects. Those concrete classes can share the same interface (Vehicle). Client uses the Creator, and the Creator contains the logic to generate the object."
        ],
        3 => [
            'name' => 'Builder',
            'title' => 'Framework suggestion for diverse applications.',
            'type' => 'creational',
            'route' => 'builder',
            'img' => '/img/builder.svg',
            'details' => "Builder is a creational design pattern that lets you construct complex objects step by step. The pattern allows you to produce different types and representations of an object using the same construction code.",
            'implementation' => "There it's a class (Director) which selects a builder class. It can change the builder, reset the builder or execute the builder (build method). Builder classes share same interface (AbstractFrameworkBuilder) that has the knowledge to create the object (by steps)."
        ],
        4 => [
            'name' => 'Singleton',
            'title' => 'Changing configuration settings.',
            'type' => 'creational',
            'route' => 'singleton',
            'img' => '/img/singleton.svg',
            'details' => "Singleton is a creational design pattern that lets you ensure that a class has only one instance, while providing a global access point to this instance.",
            'implementation' => "It has a class (Singleton) with disabled methods (__construct, __clone, __wakeup). So the only way to create an object it's by a custom static method (getInstance) which check if the class has stored a created object and return it. If the class has no object, the static method will create it and will store it. In this way, the client will work with one object of the class only. "
        ],
        5 => [
            'name' => 'Prototype',
            'title' => 'Cloning a vehicle object.',
            'type' => 'creational',
            'route' => 'prototype',
            'img' => '/img/prototype.svg',
            'details' => "Prototype is a creational design pattern that lets you copy existing objects without making your code dependent on their classes.",
            'implementation' => "Php has a great way to clone objects. So when an object is cloned, Php is searching for the magic method '__clone()' in the class (in this exemple, Vehicle class). If the method it's defined, Php will execute the code before cloning the object. So, in this exemple, the __clone method has a delay of 2 seconds to finish and change the values of the object."
        ],
        6 => [
            'name' => 'Adapter',
            'title' => 'Adapting a PlaneInterface to a CarInterface.',
            'type' => 'structural',
            'route' => 'adapter',
            'img' => '/img/adapter.svg',
            'details' => "Adapter is a structural design pattern that allows objects with incompatible interfaces to collaborate.",
            'implementation' => 'There are 2 concrete classes (Car and Plane) that implement 2 different interfaces (CarInterface and PlaneInterface). This pattern represents the solution to make the Plane object have the same interface as the Car object. So, a new class PlaneAdapter implements CarInterface and has the Plane object. The client calls the adapter CarInterface implementation to execute PlaneInterface implementation (of the Plane class).'
        ],
        7 => [
            'name' => 'Bridge',
            'title' => 'Add and run a type of Engine to a type of Vehicle.',
            'type' => 'structural',
            'route' => 'bridge',
            'img' => '/img/bridge.svg',
            'details' => 'Bridge is a structural design pattern that lets you split a large class or a set of closely related classes into two separate hierarchies—abstraction and implementation—which can be developed independently of each other.',
            'implementation' => 'There are 2 different hierarchys, one implements Engine and the other one beeing an abstract Car class. The Car class contains the Engine, the Car methods call the Engine methods. In this way, the abstraction it is separated from the implementation. So the client creates a concrete car class (Mazda, Ford, Mercedess, Audi) and a concrete engine class (Diesel, Hybride, Eletric). By keeping the abstraction away from the implementation, more concrete classes can be added, a great way for SOLID principles.'
        ],
        8 => [
            'name' => 'Composite',
            'title' => 'Generate groups of classes with students.',
            'type' => 'structural',
            'route' => 'composite',
            'img' => '/img/composite.svg',
            'details' => "Composite is a structural design pattern that lets you compose objects into tree structures and then work with these structures as if they were individual objects.",
            'implementation' => 'There are component classes (implements Component interface) that are either composite, either leafs. So the composite classes (Catalog, Group, Student) can addChildren and call children method. The leaf class (Grades) has no children, the deepness ends here.  Client selects number of group classes, number of children and number of grades, to create a Catalog. Calling the interface method "operation" on the Catalog object traverse all the children until reaches the leaf (Grade) object.'
        ],
        9 => [
            'name' => 'Decorator',
            'title' => 'Adding to a Game type a Device decorator.',
            'type' => 'structural',
            'route' => 'decorator',
            'img' => '/img/decorator.svg',
            'details' => "Decorator is a structural design pattern that lets you attach new behaviors to objects by placing these objects inside special wrapper objects that contain the behaviors.",
            'implementation' => 'Decorator represents an alternative for subclasses. AbstractDecorator implements GameInterface as other concrete game classes (Counterstrike, Solitaire, Needforspeed). AbstractDecorator has a GameInterface object also, so the concrete decorator (ConsoleDecorator) can modify the implemented method.'
        ],
        10 => [
            'name' => 'Facade',
            'title' => 'Plane info message system.',
            'type' => 'structural',
            'route' => 'facade',
            'img' => '/img/facade.svg',
            'details' => "Facade is a structural design pattern that provides a simplified interface to a library, a framework, or any other complex set of classes",
            'implementation' => 'There is a concrete class (Plane) that has a facade (Engine) and can call different methods. This methods of the Engine call multiple subsystem methods. So the facade has multiple other classes (OilSensor, FuelSensor, TemperatureSensor, FlapsSensor, LandingGear) that interract with each others. The client does not know the complexity of the subsystem of the facade and do not need to.'
        ],
        11 => [
            'name' => 'Flyweight',
            'title' => 'Random map generator.',
            'type' => 'structural',
            'route' => 'flyweight',
            'img' => '/img/flyweight.svg',
            'details' => "Flyweight is a structural design pattern that lets you fit more objects into the available amount of RAM by sharing common parts of state between multiple objects instead of keeping all of the data in each object.",
            'implementation' => 'The MapGenerator class has a method that call TitleFactory. This factory can create 3 different concrete classes (Town, Guard, Obstacle). When it creates first of each type, it stores the object into cache, so the next time when it needs to create another one, it will get the standard model object. This object from the cache contains sharable proprieties (intrisic state) and can be added new ones (extrinsic data). '
        ],
        12 => [
            'name' => 'Proxy',
            'title' => 'Embeded Youtube clip controll.',
            'type' => 'structural',
            'route' => 'proxy',
            'img' => '/img/proxy.svg',
            'details' => "Proxy is a structural design pattern that lets you provide a substitute or placeholder for another object. A proxy controls access to the original object, allowing you to perform something either before or after the request gets through to the original object.",
            'implementation' => "There are 2 classes (Website and ProxyWebsite) that implements same interface (RequestInterface). The implemented method of the Website class reprsents an Youtube clip request. To controll the access of the clip, the client will make the request via ProxyWebsite class. So, the ProxyWebsite implemented method has conditional cases. If the conditions are valid, ProxyWebsite will create a Website object and will call the request.", 
        ],
        13 => [
            'name' => 'Chain of responsability',
            'title' => 'Note dispenser.',
            'type' => 'behavior',
            'route' => 'chain',
            'img' => '/img/chain.svg',
            'details' => "Chain of Responsibility is a behavioral design pattern that lets you pass requests along a chain of handlers. Upon receiving a request, each handler decides either to process the request or to pass it to the next handler in the chain.",
            'implementation' => 'There are multiple concrete classes (TenNote, TwentyNote, FiftyNonte, HundredNote) that implements same interface (DispenseChain). Each class can contain another one by setNextChain method. Each class has a dispense method that traverse the chain, or if it is not the last class. Client will enter the Currency object value and the chain classes will dispense the count of each note. The value has to be a multiple of 10'
        ],
        14 => [
            'name' => 'Command',
            'title' => 'Betting website interface.',
            'type' => 'behavior',
            'route' => 'command',
            'img' => '/img/command.svg',
            'details' => "Command is a behavioral design pattern that turns a request into a stand-alone object that contains all information about the request. This transformation lets you pass requests as a method arguments, delay or queue a request’s execution, and support undoable operations.",
            'implementation' => "The invoker class (Account) adds a command (Bet) that implements the command interface (BetInterface). The command has a reciver class (Ticket) and can access it's methods. So the invoker class will send a request to the command interface and will execute the reciver methods. In this case, the Account will add the Bet command and will pass the parameters to the reciver using the command."
        ],
        15 => [
            'name' => 'Iterator',
            'title' => 'Word filter.',
            'type' => 'behavior',
            'route' => 'iterator',
            'img' => '/img/iterator.svg',
            'details' => "Iterator is a behavioral design pattern that lets you traverse elements of a collection without exposing its underlying representation (list, stack, tree, etc.).",
            'implementation' => "Php has already the interfaces to design the Iterator pattern. So WordsCollection implements the IteratorAggragate and the AlphabeticalOrderIterator implements the Iterator interface. The client inputs the text that will be filtred and the parameters to do so. The iterator will check each word's length and if it's less that the input parameter, it will not be shown in the result."
        ],
        16 => [
            'name' => 'Interpreter',
            'title' => 'Units of measurement convertor.',
            'type' => 'behavior',
            'route' => 'interpreter',
            'img' => '/img/interpreter.svg',
            'details' => "The interpreter pattern is a design pattern that specifies how to evaluate sentences in a language. The basic idea is to have a class for each symbol. The syntax tree of a sentence in the language is an instance of the composite pattern and is used to evaluate (interpret) the sentence for a client",
            'implementation' => "The intent of this pattern it's to convert a language into another one. Unfortunate there are not good exemples for this one, so this implementation can be inaccurate. There are multiple concrete classes that implements same interface(Converter). The client inputs a integer value and will select the type of convertor. The output result represents the calculation of the input value with different constants."
        ],
        17 => [
            'name' => 'Mediator',
            'title' => 'Broadcasting a message from a user.',
            'type' => 'behavior',
            'route' => 'mediator',
            'img' => '/img/mediator.svg',
            'details' => "Mediator is a behavioral design pattern that lets you reduce chaotic dependencies between objects. The pattern restricts direct communications between the objects and forces them to collaborate only via a mediator object.",
            'implementation' => "There it's a ChatMediator interface that has 2 methods (sendMessage and addUser). The ChatMediatorImpl (the concrete mediator) contains the logic for User objects to comunicate with each other. UserImpl it's a class that implements User interface and his 'send' method is calling ChatMediatorImpl 'sendMessage'. This method will call all added users 'recive' method. All users recive the message, but the user who called the initial 'send' method."
        ],
        18 => [
            'name' => 'Memento',
            'title' => 'Cache state text object.',
            'type' => 'behavior',
            'route' => 'memento',
            'img' => '/img/memento.svg',
            'details' => "Memento is a behavioral design pattern that lets you save and restore the previous state of an object without revealing the details of its implementation.",
            'implementation' => "The Memento pattern delegates creating the state snapshots to the actual owner of that state, the originator object. Hence, instead of other objects trying to copy the editor’s state from the “outside,” the editor class itself can make the snapshot since it has full access to its own state."
        ],
        19 => [
            'name' => 'Observer',
            'title' => 'Send a message to attached users.',
            'type' => 'behavior',
            'route' => 'observer',
            'img' => '/img/observer.svg',
            'details' => "Observer is a behavioral design pattern that lets you define a subscription mechanism to notify multiple objects about any events that happen to the object they’re observing.",
            'implementation' => "The Observer pattern suggests that you add a subscription mechanism to the publisher class so individual objects can subscribe to or unsubscribe from a stream of events coming from that publisher. Fear not! Everything isn’t as complicated as it sounds. In reality, this mechanism consists of 1) an array field for storing a list of references to subscriber objects and 2) several public methods which allow adding subscribers to and removing them from that list."
        ],
        20 => [
            'name' => 'State',
            'title' => 'Change mobile status.',
            'type' => 'behavior',
            'route' => 'state',
            'img' => '/img/state.svg',
            'details' => "State is a behavioral design pattern that lets an object alter its behavior when its internal state changes. It appears as if the object changed its class.",
            'implementation' => "The State pattern suggests that you create new classes for all possible states of an object and extract all state-specific behaviors into these classes."
        ],
        21 => [
            'name' => 'Strategy',
            'title' => 'Calculate distance and time to a destination.',
            'type' => 'behavior',
            'route' => 'strategy',
            'img' => '/img/strategy.svg',
            'details' => "Strategy is a behavioral design pattern that lets you define a family of algorithms, put each of them into a separate class, and make their objects interchangeable.",
            'implementation' => "The Strategy pattern suggests that you take a class that does something specific in a lot of different ways and extract all of these algorithms into separate classes called strategies."
        ],
        22 => [
            'name' => 'Template method',
            'title' => 'Menu order system.',
            'type' => 'behavior',
            'route' => 'template',
            'img' => '/img/template.svg',
            'details' => "Template Method is a behavioral design pattern that defines the skeleton of an algorithm in the superclass but lets subclasses override specific steps of the algorithm without changing its structure.",
            'implementation' => "The Template Method pattern suggests that you break down an algorithm into a series of steps, turn these steps into methods, and put a series of calls to these methods inside a single template method. "
        ],
        23 => [
            'name' => 'Visitor',
            'title' => 'Shopping cart interface.',
            'type' => 'behavior',
            'route' => 'visitor',
            'img' => '/img/visitor.svg',
            'details' => "Visitor is a behavioral design pattern that lets you separate algorithms from the objects on which they operate.",
            'implementation' => "The Visitor pattern suggests that you place the new behavior into a separate class called visitor, instead of trying to integrate it into existing classes. The original object that had to perform the behavior is now passed to one of the visitor’s methods as an argument, providing the method access to all necessary data contained within the object.

            "
        ],
    ];

    public function getList(){

        return Self::PATTERNS;

    }

    public function getPattern(int $id){

        return Self::PATTERNS[$id];
        
    }

}
