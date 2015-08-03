using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace TicketCalculator
{
    public partial class ticketCalculatorForm : Form
    {
        public ticketCalculatorForm()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            employmentTypeGroupBox.Hide();

            if (studentRadioButton.Checked)
            {
                seniorCheckbox.Enabled = true;
            }
            else
            {
                seniorCheckbox.Enabled = false;
            }

            if (facultyAndStaffRadioButton.Checked)
            {
                employmentTypeGroupBox.Show();
            }
            else
            {
                employmentTypeGroupBox.Hide();
            }
        }

        private void facultyAndStaffRadioButton_CheckedChanged(object sender, EventArgs e)
        {
            if (facultyAndStaffRadioButton.Checked)
            {
                employmentTypeGroupBox.Show();
            }
            else
            {
                employmentTypeGroupBox.Hide();
            }
        }

        private void exitButton_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void calculateButton_Click(object sender, EventArgs e)
        {
            const double SPEED_LIMIT = 35;
            double speedClocked = 0;
            double milesOverLimit;
            
            double initialCharge = 0;
            double milesOverRate = 0;
            double ticketAmount;

            try
            {
                speedClocked = double.Parse(speedClockedTextBox.Text);
            }
            catch (Exception ex)
            {
                MessageBox.Show("Please enter the speed clocked.");
                return;
            }

            milesOverLimit = speedClocked - SPEED_LIMIT;

            overLimitCalculatedLabel.Text = milesOverLimit.ToString();

            if (visitorRadioButton.Checked)
            {
                initialCharge = 20;
                milesOverRate = 0;
            }
            else if(studentRadioButton.Checked)
            {
                initialCharge = 75;
                milesOverRate = 87.50;

                if (seniorCheckbox.Checked)
                {
                    initialCharge = 125;

                    if (milesOverLimit > 20)
                    {
                        initialCharge = 200;
                    }
                }
            }
            else if (facultyAndStaffRadioButton.Checked)
            {
                if (fullTimeRadioButton.Checked)
                {
                    initialCharge = 75;
                    milesOverRate = 30;
                }
                else if (partTimeRadioButton.Checked)
                {
                    initialCharge = 50;
                    milesOverRate = 20;
                }
            }

            double numTimesOver5 = Math.Truncate(milesOverLimit / 5);

            double milesOverCharge = milesOverRate * numTimesOver5;

            ticketAmount = milesOverCharge + initialCharge;

            ticketAmountLabel.Text = ticketAmount.ToString("c");
        }

        private void studentRadioButton_CheckedChanged(object sender, EventArgs e)
        {
            if (studentRadioButton.Checked)
            {
                seniorCheckbox.Enabled = true;
            }
            else
            {
                seniorCheckbox.Enabled = false;
            }
        }
    }
}