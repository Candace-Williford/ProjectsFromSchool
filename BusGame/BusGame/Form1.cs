using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace BusGame
{
    public partial class BusGameForm : Form
    {
        const int AVG_WEIGHT = 200;
        const int NUM_PASSENGERS = 7;
        Passenger[] passengers;
        Passenger newPassenger; //Passenger that wants to get on the bus

        public BusGameForm()
        {
            InitializeComponent();
        }

        private void instructionButton_Click(object sender, EventArgs e)
        {
            MessageBox.Show("The goal of the game is to guess the weight of the person who wants to get on the bus to bring the average weight of all the passengers on the bus to 200 lbs. But the catch is when another person gets on the bus, Person 7 gets kicked off the bus. \n\n Enter the weight you think is needed and then click the guess button.");
        }

        private void BusGameForm_Load(object sender, EventArgs e)
        {
            InitiatePassengers();
        }


        //create passengers. Make sure weight of the new passenger is not negative or zero.
        //if it is recreate the passengers. After all is well, set the text of the passenger
        //labels.
        private void InitiatePassengers()
        {
            //initially create the passengers
            CreatePassengers();

            //if the newPassenger's weight is less than or equal to zero
            //recreate the passengers
            while (newPassenger.weight <= 110 || newPassenger.weight >= 350)
            {
                CreatePassengers();
            }

            SetPassengerLabels();
        }

        //Generate the weight that the new passenger should weigh.
        private int GenerateWeight()
        {
            int whatWeight = 0;
            int knownWeights = 0;

            foreach (Passenger p in passengers)
            {
                knownWeights += p.weight;
            }

            //Do this to ignore the weight of the 7th passenger on the bus
            //because they are going to be removed anyways.
            knownWeights -= passengers[6].weight;

            whatWeight = (AVG_WEIGHT * NUM_PASSENGERS) - knownWeights;

            return whatWeight;
        }

        private void guessButton_Click(object sender, EventArgs e)
        {
            int guessedWeight = 0;

            if (!int.TryParse(weightGuessTextBox.Text, out guessedWeight))
            {
                MessageBox.Show("You did not enter a valid number.");
                return;
            }

            if (guessedWeight == newPassenger.weight)
            {
                //if yes clicked
                if (MessageBox.Show("You got it! Want to go again?", "Again",
                    MessageBoxButtons.YesNo, MessageBoxIcon.Question,
                    MessageBoxDefaultButton.Button1) == System.Windows.Forms.DialogResult.Yes)
                {
                    InitiatePassengers();
                }
                else
                {
                    MessageBox.Show("Ok, Bye!");
                    this.Close();
                }
            }
        }

        private void CreatePassengers()
        {
            //Instaintiates the one instance of the random object.
            //If I do it in the Passenger class as I did originally,
            //I get the same number for all the weights.
            //Has to do with the seed. Reference pg 326 of textbook.
            Random rand = new Random((int)DateTime.Now.Ticks);

            //Create an array of passengers.
            passengers = new Passenger[NUM_PASSENGERS];

            //Create all the passengers.
            for (int i = 0; i < passengers.Length; i++)
            {
                passengers[i] = new Passenger(rand);
                passengers[i].GenerateWeight();
            }

            newPassenger = new Passenger(rand);
            newPassenger.weight = GenerateWeight();
            //MessageBox.Show(newPassenger.weight.ToString()); //Uncomment this line to automatically receive the answer.
        }

        private void SetPassengerLabels()
        {
            //Assign the weights of all the passengers to a corresponding label.
            passenger1WeightLabel.Text = passengers[0].weight.ToString();
            passenger2WeightLabel.Text = passengers[1].weight.ToString();
            passenger3WeightLabel.Text = passengers[2].weight.ToString();
            passenger4WeightLabel.Text = passengers[3].weight.ToString();
            passenger5WeightLabel.Text = passengers[4].weight.ToString();
            passenger6WeightLabel.Text = passengers[5].weight.ToString();
            passenger7WeightLabel.Text = passengers[6].weight.ToString();
        }
    }
}