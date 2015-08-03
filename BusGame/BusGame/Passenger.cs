using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace BusGame
{
    class Passenger
    {
        public int weight = 0;
        Random rand;

        public Passenger(Random rand)
        {
            this.rand = rand;
        }

        public void GenerateWeight()
        {
            weight = rand.Next(110, 350);
        }
    }
}
