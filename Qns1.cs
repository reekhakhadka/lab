using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Reekha3
{

    class Circle
    {
        double radius;

        // Default Constructor
        public Circle()
        {
            radius = 1;
        }

        // Parameterized Constructor
        public Circle(double r)
        {
            radius = r;
        }

        public double CalculateArea()
        {
            return Math.PI * radius * radius;
        }

        public double CalculateCircumference()
        {
            return 2 * Math.PI * radius;
        }
    }

    class Qns1
    {
        static void Main()
        {
            Circle c = new Circle(5);

            Console.WriteLine("Area = " + c.CalculateArea());
            Console.WriteLine("Circumference = " + c.CalculateCircumference());
        }
    }
}
