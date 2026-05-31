using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Reekha3
{

    // Base Class
   /* class Vehicle
    {
        private string name;
        protected float speed;

        // Constructor
        protected Vehicle(string name)
        {
            this.name = name;
            speed = 0;
        }

        // Method to move vehicle
        public virtual float Move(float distance)
        {
            speed = distance / 2;
            return speed;
        }

        // Getter method
        public string GetName()
        {
            return name;
        }

        // Description method
        public virtual string Describe()
        {
            return "Vehicle Name: " + name;
        }
    }

    // Derived Class: MotorVehicle
    class MotorVehicle : Vehicle
    {
        protected int number_of_wheels;
        public float engine_volume;

        protected MotorVehicle(string name) : base(name)
        {
            number_of_wheels = 4;
            engine_volume = 2.0f;
        }

        public virtual string HonkHorn()
        {
            return "Beep Beep!";
        }
    }

    // Derived Class: Airplane
    class Airplane : Vehicle
    {
        private float wingspan;
        private int capacity;

        public Airplane(string name, float wingspan, int capacity)
            : base(name)
        {
            this.wingspan = wingspan;
            this.capacity = capacity;
        }

        // Landing gear method
        private void LandingGear(bool set)
        {
            if (set)
                Console.WriteLine("Landing gear deployed.");
            else
                Console.WriteLine("Landing gear retracted.");
        }

        // Override move method
        public override float Move(float distance)
        {
            speed = distance / 5;
            return speed;
        }

        // Override describe method
        public override string Describe()
        {
            return "Airplane: " + GetName() +
                   ", Wingspan: " + wingspan +
                   " ft, Capacity: " + capacity;
        }
    }

    // Derived Class: Truck
    class Truck : MotorVehicle
    {
        private float horsepower;
        private int num_doors;

        public Truck(string name, float horsepower)
            : base(name)
        {
            this.horsepower = horsepower;
            num_doors = 2;
        }

        public override string Describe()
        {
            return "Truck: " + GetName() +
                   ", Horsepower: " + horsepower +
                   ", Doors: " + num_doors;
        }

        public override string HonkHorn()
        {
            return "Truck Horn: HONK HONK!";
        }
    }

    // Derived Class: Car
    class Car : MotorVehicle
    {
        private int num_doors;

        public Car(string name, int num_doors)
            : base(name)
        {
            this.num_doors = num_doors;
        }

        public override string Describe()
        {
            return "Car: " + GetName() +
                   ", Doors: " + num_doors;
        }

        public override string HonkHorn()
        {
            return "Car Horn: Beep Beep!";
        }
    }

    // Main Class
    class Qns11
    {
        static void Main()
        {
            // Airplane Object
            Airplane airplane = new Airplane("Boeing 747", 68.5f, 400);

            Console.WriteLine(airplane.Describe());
            Console.WriteLine("Speed: " + airplane.Move(1000) + " km/h");

            Console.WriteLine();

            // Truck Object
            Truck truck = new Truck("Volvo Truck", 500);

            Console.WriteLine(truck.Describe());
            Console.WriteLine(truck.HonkHorn());

            Console.WriteLine();

            // Car Object
            Car car = new Car("Tesla Model S", 4);

            Console.WriteLine(car.Describe());
            Console.WriteLine(car.HonkHorn());
        }
    }*/
}
