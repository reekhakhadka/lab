using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Reekha3
{

    /*class Time
    {
        int hours, minutes, seconds;

        public Time()
        {
            hours = minutes = seconds = 0;
        }

        public Time(int h, int m, int s)
        {
            hours = h;
            minutes = m;
            seconds = s;
        }

        public void Add(Time t)
        {
            seconds += t.seconds;
            minutes += t.minutes + seconds / 60;
            hours += t.hours + minutes / 60;

            seconds %= 60;
            minutes %= 60;
        }

        public void Subtract(Time t)
        {
            int total1 = hours * 3600 + minutes * 60 + seconds;
            int total2 = t.hours * 3600 + t.minutes * 60 + t.seconds;

            int diff = total1 - total2;

            hours = diff / 3600;
            minutes = (diff % 3600) / 60;
            seconds = diff % 60;
        }

        public void Display()
        {
            Console.WriteLine(hours + ":" + minutes + ":" + seconds);
        }
    }

    class Qns6
    {
        static void Main()
        {
            Time t1 = new Time(2, 30, 40);
            Time t2 = new Time(1, 20, 30);

            t1.Add(t2);
            Console.Write("After Addition: ");
            t1.Display();

            t1.Subtract(t2);
            Console.Write("After Subtraction: ");
            t1.Display();
        }
    }*/

}
