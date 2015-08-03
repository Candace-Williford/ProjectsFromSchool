using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.IO;

namespace JuiceBar
{
    public partial class juiceBarForm : Form
    {
        //Below is how the information about the drinks is stored in the file
        //Line 1 = chosenDrink
        //Line 2 = drinkSize
        //Line 3 = quantity
        //Line 4 = additives
        //Line 5 = drinkPrice, this includes all of the fields in lines 1-4
        StreamWriter inputFile;

        //private string[] drinktype;
        //private string[] drinksize;
        //private int[] drinkquantity;
        //private string[] drinkadditives;//if no additives on a drink the position in the array is "".
        //private int drinknumber;
        //private int totaldrinks;
        //private decimal drinkprice;
        private decimal orderTotal;
        private decimal itemPrice = 0;
        private decimal additivesPrice = 0;
        private decimal sizePrice = 0;
        private bool orderAdded = false;

        public juiceBarForm()
        {
            InitializeComponent();
        }

        private void juiceBarForm_Load(object sender, EventArgs e)
        {
            //pg315    
            try
            {
                inputFile = File.CreateText("drinks.txt");
                inputFile.Close();
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }

            checkJuicesVisble();
            checkSmoothiesVisible();
        }

        private void juiceRadioButton_CheckedChanged(object sender, EventArgs e)
        {
            checkJuicesVisble();
            checkSmoothiesVisible();
        }

        private void checkJuicesVisble()
        {
            if (juiceRadioButton.Checked)
            {
                fruitRadioButton.Enabled = true;
                veggieRadioButton.Enabled = true;

                pomegranateRadioButton.Checked = false;
                strawberryRadioButton.Checked = false;
                bananaRadioButton.Checked = false;
                wheatBerryRadioButton.Checked = false;
            }
            else if (!juiceRadioButton.Checked)
            {
                fruitRadioButton.Enabled = false;
                veggieRadioButton.Enabled = false;
            }
        }

        private void checkSmoothiesVisible()
        {
            if (smoothieRadioButton.Checked)
            {
                pomegranateRadioButton.Enabled = true;
                strawberryRadioButton.Enabled = true;
                bananaRadioButton.Enabled = true;
                wheatBerryRadioButton.Enabled = true;

                fruitRadioButton.Checked = false;
                veggieRadioButton.Checked = false;
            }
            else if (!smoothieRadioButton.Checked)
            {
                pomegranateRadioButton.Enabled = false;
                strawberryRadioButton.Enabled = false;
                bananaRadioButton.Enabled = false;
                wheatBerryRadioButton.Enabled = false;
            }
        }

        private void addToOrderButton_Click(object sender, EventArgs e)
        {
            addDrink();
        }

        private string getChosenDrink()
        {
            string chosenDrink;

            if (fruitRadioButton.Checked)
            {
                chosenDrink = fruitRadioButton.Text;
            }
            else if (veggieRadioButton.Checked)
            {
                chosenDrink = veggieRadioButton.Text;
            }
            else if (pomegranateRadioButton.Checked)
            {
                chosenDrink = pomegranateRadioButton.Text;
            }
            else if (strawberryRadioButton.Checked)
            {
                chosenDrink = strawberryRadioButton.Text;
            }
            else if (bananaRadioButton.Checked)
            {
                chosenDrink = bananaRadioButton.Text;
            }
            else if (wheatBerryRadioButton.Checked)
            {
                chosenDrink = wheatBerryRadioButton.Text;
            } else {
                chosenDrink = "";
            }

            return chosenDrink;
        }

        private string getDrinkSize()
        {
            string drinkSize;

            if (twelveOzRadioButton.Checked)
            {
                drinkSize = "12oz";
            }
            else if (sixteenOzRadioButton.Checked)
            {
                drinkSize = "16oz";
            }
            else if (twentyOzRadioButton.Checked)
            {
                drinkSize = "20oz";
            }
            else
            {
                drinkSize = "";
            }

            return drinkSize;
        }

        private string getAdditives()
        {
            string additives = "";

            if (vitaminsCheckBox.Checked)
            {
                additives += "Vitamin Pack ";
            }
            if (energyCheckBox.Checked)
            {
                additives += "Energy Boost ";
            }
            if (coolDownCheckBox.Checked)
            {
                additives += "Cool Down Remedy";
            }

            return additives;
        }

        private decimal getDrinkPrice(int quantity, string drinkSize, string additives)
        {
            decimal drinkPrice = 0m;

            switch (drinkSize)
            {
                case "12oz":
                    drinkPrice = 3m;
                    break;
                case "16oz":
                    drinkPrice = 3.50m;
                    break;
                case "20oz":
                    drinkPrice = 4.00m;
                    break;
            }

            switch (additives)
            {
                case "None":
                    drinkPrice += 0;
                    break;
                case "Vitamin Pack for $0.40 Extra":
                    drinkPrice += 0.40m;
                    break;
                case "Energy Boost for $0.50 Extra":
                    drinkPrice += 0.50m;
                    break;
                case "Cool Down Remedy for $0.60 Extra":
                    drinkPrice += 0.60m;
                    break;
            }

            drinkPrice *= quantity;

            return drinkPrice;
        }

        private void addDrink()
        {
            string chosenDrink;
            string drinkSize;
            int quantity;
            string additives;
            //decimal drinkPrice;

            chosenDrink = getChosenDrink();
            if (chosenDrink == "")
            {
                MessageBox.Show("You didn't pick a drink.");
                return;
            }

            drinkSize = getDrinkSize();
            if (drinkSize == "")
            {
                MessageBox.Show("You didn't pick a size.");
                return;
            }

            if (!int.TryParse(quantityTextBox.Text, out quantity))
            {
                MessageBox.Show("You need to enter a valid quantity.");
                return;
            }
            
            if (quantity <= 0)
            {
                MessageBox.Show("Zero or less is not a valid quantity.");
                return;
            }

            additives = getAdditives();

            //drinkPrice = getDrinkPrice(quantity, drinkSize, additives);
            itemPrice *= quantity;

            try
            {
                inputFile = File.AppendText("drinks.txt");
                inputFile.WriteLine(chosenDrink);
                inputFile.WriteLine(drinkSize);
                inputFile.WriteLine(quantity);
                inputFile.WriteLine(additives);
                inputFile.WriteLine(itemPrice);
                inputFile.Close();
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }

            orderAdded = true;
            orderTotal += itemPrice;

            MessageBox.Show("Drink Request Price: " + itemPrice.ToString("c"));
            orderTotalLabel.Text = orderTotal.ToString("c");

            resetForm();
        }

        private void resetForm()
        {
            itemPrice = 0;

            //reset juice radio buttons
            juiceRadioButton.Checked = false;
            fruitRadioButton.Checked = false;
            veggieRadioButton.Checked = false;

            //reset smoothie radio buttons
            smoothieRadioButton.Checked = false;
            pomegranateRadioButton.Checked = false;
            strawberryRadioButton.Checked = false;
            bananaRadioButton.Checked = false;
            wheatBerryRadioButton.Checked = false;

            //reset size radio buttons
            twelveOzRadioButton.Checked = false;
            sixteenOzRadioButton.Checked = false;
            twentyOzRadioButton.Checked = false;

            //reset additives checkboxes
            vitaminsCheckBox.Checked = false;
            energyCheckBox.Checked = false;
            coolDownCheckBox.Checked = false;

            //clear out quantity text box and item price label
            quantityTextBox.Text = "";
            itemPriceLabel.Text = "$0.00";
        }

        private void exitToolStripMenuItem_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void exitButton_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void addToOrderToolStripMenuItem_Click(object sender, EventArgs e)
        {
            addDrink();
        }

        private void orderSummaryButton_Click(object sender, EventArgs e)
        {
            showOrderInfo();
        }

        private void showOrderInfo()
        {
            //Below is how the information about the drinks is stored in the file
            //Line 1 = chosenDrink
            //Line 2 = drinkSize
            //Line 3 = quantity
            //Line 4 = additives
            //Line 5 = drinkPrice, this includes all of the fields in lines 1-4

            if (orderAdded)
            {
                string printMessage = "";
                int drinksAdded = 0;
                StreamReader outputFile;

                outputFile = File.OpenText("drinks.txt");

                for (int i = 1; !outputFile.EndOfStream; i++)
                {
                    switch (i % 5)
                    {
                        case 1:
                            drinksAdded++;
                            printMessage += "Drink Request " + drinksAdded + "\n-----------------------\n" + "Juice Type: " + outputFile.ReadLine() + "\n";
                            break;
                        case 2:
                            printMessage += "Drink Size: " + outputFile.ReadLine() + "\n";
                            break;
                        case 3:
                            printMessage += "Quantity: " + outputFile.ReadLine() + "\n";
                            break;
                        case 4:
                            printMessage += "Additives: " + outputFile.ReadLine() + "\n";
                            break;
                        case 0:
                            printMessage += "Drink(s) Price: $" + outputFile.ReadLine() + "\n\n";
                            break;
                        default:
                            MessageBox.Show("Reached the default in the switch statement in showOrderInfo().");
                            break;
                    }
                }

                outputFile.Close();

                printMessage += "-----------------------\nOrder Total: " + orderTotal.ToString("c");

                MessageBox.Show(printMessage);
            }
            else
            {
                MessageBox.Show("You haven't add anything to the order.");
            }
        }

        private void summaryToolStripMenuItem_Click(object sender, EventArgs e)
        {
            showOrderInfo();
        }

        private void orderCompleteButton_Click(object sender, EventArgs e)
        {
            endOrder();
        }

        private void endOrder()
        {
            if (orderAdded)
            {
                drinkTypeGroupBox.Visible = false;
                sizeGroupBox.Visible = false;
                quantityLabel.Visible = false;
                quantityTextBox.Visible = false;
                additivesGroupBox.Visible = false;
                itemPricePromptLabel.Visible = false;
                itemPriceLabel.Visible = false;
                addToOrderButton.Visible = false;
                orderSummaryButton.Visible = false;
                orderTotalPromptLabel.Visible = false;
                orderTotalLabel.Visible = false;
                orderCompleteButton.Visible = false;

                showOrderInfo();
            }
            else
            {
                MessageBox.Show("You haven't added anything to the order.");
            }
        }

        private void twelveOzRadioButton_CheckedChanged(object sender, EventArgs e)
        {
            sizePrice = 3m;
            itemPrice = additivesPrice + sizePrice;

            itemPriceLabel.Text = itemPrice.ToString("c");
        }

        private void sixteenOzRadioButton_CheckedChanged(object sender, EventArgs e)
        {
            sizePrice = 3.5m;
            itemPrice = additivesPrice + sizePrice;

            itemPriceLabel.Text = itemPrice.ToString("c");
        }

        private void twentyOzRadioButton_CheckedChanged(object sender, EventArgs e)
        {
            sizePrice = 4m;
            itemPrice = additivesPrice + sizePrice;

            itemPriceLabel.Text = itemPrice.ToString("c");
        }

        private void vitaminsCheckBox_CheckedChanged(object sender, EventArgs e)
        {
            if (vitaminsCheckBox.Checked)
            {
                additivesPrice += 0.4m;
            }
            else
            {
                additivesPrice -= 0.4m;
            }

            itemPrice = additivesPrice + sizePrice;

            itemPriceLabel.Text = itemPrice.ToString("c");
        }

        private void energyCheckBox_CheckedChanged(object sender, EventArgs e)
        {
            if (energyCheckBox.Checked)
            {
                additivesPrice += 0.5m;
            }
            else
            {
                additivesPrice -= 0.5m;
            }

            itemPrice = additivesPrice + sizePrice;

            itemPriceLabel.Text = itemPrice.ToString("c");
        }

        private void coolDownCheckBox_CheckedChanged(object sender, EventArgs e)
        {
            if (coolDownCheckBox.Checked)
            {
                additivesPrice += 0.6m;
            }
            else
            {
                additivesPrice -= 0.6m;
            }

            itemPrice = additivesPrice + sizePrice;

            itemPriceLabel.Text = itemPrice.ToString("c");
        }

        private void orderCompleteToolStripMenuItem_Click(object sender, EventArgs e)
        {
            endOrder();
        }

        private void aboutToolStripMenuItem_Click(object sender, EventArgs e)
        {
            MessageBox.Show("This application calculates the amount due for individual drink orders at the Pellissippi juice bar and maintains accumulated totals for a summary.");
        }

        private void colorToolStripMenuItem_Click(object sender, EventArgs e)
        {
            //colorDialog.ShowDialog();

           if(colorDialog.ShowDialog() == DialogResult.OK)
           {
               juiceBarMenu.ForeColor = colorDialog.Color;
               summaryToolStripMenuItem.ForeColor = colorDialog.Color;
               exitToolStripMenuItem.ForeColor = colorDialog.Color;
               addToOrderToolStripMenuItem.ForeColor = colorDialog.Color;
               orderCompleteToolStripMenuItem.ForeColor = colorDialog.Color;
               fontToolStripMenuItem.ForeColor = colorDialog.Color;
               colorToolStripMenuItem.ForeColor = colorDialog.Color;
               aboutToolStripMenuItem.ForeColor = colorDialog.Color;

               drinkTypeGroupBox.ForeColor = colorDialog.Color;
               juiceGroupBox.ForeColor = colorDialog.Color;
               smoothieTypeGroupBox.ForeColor = colorDialog.Color;
               sizeGroupBox.ForeColor = colorDialog.Color;
               additivesGroupBox.ForeColor = colorDialog.Color;
               quantityLabel.ForeColor = colorDialog.Color;
               quantityTextBox.ForeColor = colorDialog.Color;
               itemPriceLabel.ForeColor = colorDialog.Color;
               itemPricePromptLabel.ForeColor = colorDialog.Color;
               addToOrderButton.ForeColor = colorDialog.Color;
               orderTotalLabel.ForeColor = colorDialog.Color;
               orderTotalPromptLabel.ForeColor = colorDialog.Color;
               orderSummaryButton.ForeColor = colorDialog.Color;
               orderCompleteButton.ForeColor = colorDialog.Color;
               exitButton.ForeColor = colorDialog.Color;
           }
        }

        private void fontToolStripMenuItem_Click(object sender, EventArgs e)
        {
            if (fontDialog.ShowDialog() == DialogResult.OK)
            {
                juiceBarMenu.Font = fontDialog.Font;
                summaryToolStripMenuItem.Font = fontDialog.Font;
                exitToolStripMenuItem.Font = fontDialog.Font;
                addToOrderToolStripMenuItem.Font = fontDialog.Font;
                orderCompleteToolStripMenuItem.Font = fontDialog.Font;
                fontToolStripMenuItem.Font = fontDialog.Font;
                colorToolStripMenuItem.Font = fontDialog.Font;
                aboutToolStripMenuItem.Font = fontDialog.Font;

                drinkTypeGroupBox.Font = fontDialog.Font;
                juiceGroupBox.Font = fontDialog.Font;
                smoothieTypeGroupBox.Font = fontDialog.Font;
                sizeGroupBox.Font = fontDialog.Font;
                additivesGroupBox.Font = fontDialog.Font;
                quantityLabel.Font = fontDialog.Font;
                quantityTextBox.Font = fontDialog.Font;
                itemPriceLabel.Font = fontDialog.Font;
                itemPricePromptLabel.Font = fontDialog.Font;
                addToOrderButton.Font = fontDialog.Font;
                orderTotalLabel.Font = fontDialog.Font;
                orderTotalPromptLabel.Font = fontDialog.Font;
                orderSummaryButton.Font = fontDialog.Font;
                orderCompleteButton.Font = fontDialog.Font;
                exitButton.Font = fontDialog.Font;
            }
        }
    }
}
