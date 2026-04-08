using System;
using System.Collections.Generic;
using System.Text;


namespace OuterNamespace
    {
        namespace InnerNamespace
        {
            class Demo
            {
                public void Show()
                {
                    Console.WriteLine("Inside Nested Namespace");
                }
            }
        }
    }

    class Program
    {
        static void Main()
        {
            OuterNamespace.InnerNamespace.Demo obj =
                new OuterNamespace.InnerNamespace.Demo();

            obj.Show();
        }
    }


