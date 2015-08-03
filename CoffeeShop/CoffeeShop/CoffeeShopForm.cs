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
using System.Diagnostics;

namespace CoffeeShop
{
    public partial class CoffeeShopForm : Form
    {
        public CoffeeShopForm()
        {
            InitializeComponent();
        }

        private void exitButton_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void CoffeeShopForm_Load(object sender, EventArgs e)
        {
            if (!File.Exists("flavors.txt"))
            {
                StreamWriter file = File.CreateText("flavors.txt");
                file.Close();
            }

            if (!File.Exists("syrups.txt"))
            {
                StreamWriter file = File.CreateText("syrups.txt");
                file.Close();
            }

            populateSyrupsList("syrups.txt");
            populateComboBox(removeFlavorComboBox, "flavors.txt");
            populateComboBox(flavorsComboBox, "flavors.txt");
            populateComboBox(removeSyrupComboBox, "syrups.txt");
        }

        private void populateSyrupsList(string filePath)
        {
            try 
            {
                syrupsListBox.Items.Clear();

                using (var reader = new StreamReader(filePath))
                {
                    string line;

                    while ((line = reader.ReadLine()) != null)
                    {
                        syrupsListBox.Items.Add(line);
                    }

                    reader.Close();
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
            
        }

        private void populateComboBox(ComboBox comboBox, string filePath)
        {

            try
            {
                comboBox.Items.Clear();

                using (var reader = new StreamReader(filePath))
                {
                    string line;

                    while(!reader.EndOfStream)
                    {
                        line = reader.ReadLine();
                        comboBox.Items.Add(line);
                    }

                    reader.Close();
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }

        private void addFlavorButton_Click(object sender, EventArgs e)
        {
            try
            {
                if (addFlavorTextBox.Text != "" && !checkFlavorExists(addFlavorTextBox.Text))
                {
                    StreamWriter outputFile = File.AppendText("flavors.txt");
                    outputFile.WriteLine(addFlavorTextBox.Text);
                    outputFile.Close();
                    addFlavorTextBox.Text = "";
                }
                else
                {
                    if (addFlavorTextBox.Text == "") 
                    {
                        MessageBox.Show("You didn't enter a flavor.");
                    }
                    else if (checkFlavorExists(addFlavorTextBox.Text))
                    {
                        MessageBox.Show("That flavor is already on the list.");
                    }
                    
                }
            }
            catch(Exception ex)
            {
                MessageBox.Show(ex.Message);
            }

            populateComboBox(removeFlavorComboBox, "flavors.txt");
            populateComboBox(flavorsComboBox, "flavors.txt");
        }

        private Boolean checkFlavorExists(string flavor)
        {
            Boolean flavorFound = false;

            using (var reader = new StreamReader("flavors.txt"))
            {
                while (!reader.EndOfStream)
                {
                    if (reader.ReadLine() != flavor)
                    {
                        flavorFound = false;
                    }
                    else
                    {
                        flavorFound = true;
                    }
                }

                reader.Close();
            }
            return flavorFound;
        }

        private void clearFlavorsButton_Click(object sender, EventArgs e)
        {
            if(MessageBox.Show("Are you sure you want to clear all the flavors?", "Clear Flavors", 
                MessageBoxButtons.YesNo, 
                MessageBoxIcon.Question,
                MessageBoxDefaultButton.Button1) == System.Windows.Forms.DialogResult.Yes)
            {
                StreamWriter outputFile = File.CreateText("flavors.txt");
                outputFile.Close();
                populateComboBox(removeFlavorComboBox, "flavors.txt");
                populateComboBox(flavorsComboBox, "flavors.txt");
                countFlavorsLabel.Text = "";
            }
        }

        private void removeFlavorButton_Click(object sender, EventArgs e)
        {
            if (removeFlavorComboBox.SelectedItem != null)
            {
                removeFlavorComboBox.Items.Remove(removeFlavorComboBox.SelectedItem);
            }
            else
            {
                MessageBox.Show("You have to select the flavor you want to remove.");
            }

            StreamWriter file = File.CreateText("flavors.txt");
            for (int i = 0; i < removeFlavorComboBox.Items.Count; i++)
            {
                file.WriteLine(removeFlavorComboBox.Items[i]);
            }

            file.Close();

            populateComboBox(removeFlavorComboBox, "flavors.txt");
            populateComboBox(flavorsComboBox, "flavors.txt");
        }

        private void countFlavorsButton_Click(object sender, EventArgs e)
        {
            int numFlavors = flavorsComboBox.Items.Count;
            countFlavorsLabel.Text = numFlavors.ToString();
        }

        private void removeSyrupButton_Click(object sender, EventArgs e)
        {
            if (removeSyrupComboBox.SelectedItem != null)
            {
                removeSyrupComboBox.Items.Remove(removeSyrupComboBox.SelectedItem);
            }
            else
            {
                MessageBox.Show("You have to select the syrup you want to remove.");
            }

            StreamWriter file = File.CreateText("syrups.txt");
            for (int i = 0; i < removeSyrupComboBox.Items.Count; i++)
            {
                file.WriteLine(removeSyrupComboBox.Items[i]);
            }

            file.Close();

            populateComboBox(removeSyrupComboBox, "syrups.txt");
            populateSyrupsList("syrups.txt");
        }

        private void addSyrupButton_Click(object sender, EventArgs e)
        {
            try
            {
                if (addSyrupTextBox.Text != "" && !checkSyrupExists(addSyrupTextBox.Text))
                {
                    StreamWriter outputFile = File.AppendText("syrups.txt");
                    outputFile.WriteLine(addSyrupTextBox.Text);
                    outputFile.Close();
                    addSyrupTextBox.Text = "";
                }
                else
                {
                    if (addSyrupTextBox.Text == "")
                    {
                        MessageBox.Show("You didn't enter a syrup.");
                    }
                    else if (checkSyrupExists(addSyrupTextBox.Text))
                    {
                        MessageBox.Show("That syrup is already on the list.");
                    }

                }
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }

            populateComboBox(removeSyrupComboBox, "syrups.txt");
            populateSyrupsList("syrups.txt");
        }

        private Boolean checkSyrupExists(string syrup)
        {
            Boolean syrupFound = false;

            using (var reader = new StreamReader("syrups.txt"))
            {
                while (!reader.EndOfStream)
                {
                    if (reader.ReadLine() != syrup)
                    {
                        syrupFound = false;
                    }
                    else
                    {
                        syrupFound = true;
                    }
                }

                reader.Close();
            }
            return syrupFound;
        }

        private void countSyrupsButton_Click(object sender, EventArgs e)
        {
            int numSyrups = syrupsListBox.Items.Count;
            countSyrupsLabel.Text = numSyrups.ToString();
        }

        private void clearSyrupsButton_Click(object sender, EventArgs e)
        {
            if (MessageBox.Show("Are you sure you want to clear all the syrups?", "Clear Syrups",
                MessageBoxButtons.YesNo,
                MessageBoxIcon.Question,
                MessageBoxDefaultButton.Button1) == System.Windows.Forms.DialogResult.Yes)
            {
                StreamWriter outputFile = File.CreateText("syrups.txt");
                outputFile.Close();
                populateComboBox(removeSyrupComboBox, "syrups.txt");
                populateSyrupsList("syrups.txt");
                countSyrupsLabel.Text = "";
            }
        }

        private void clearButton_Click(object sender, EventArgs e)
        {
            if (MessageBox.Show("This will clear everything including any related files.\n Are you sure you wish to proceed?", "Clear All",
                MessageBoxButtons.YesNo,
                MessageBoxIcon.Question,
                MessageBoxDefaultButton.Button1) == System.Windows.Forms.DialogResult.Yes)
            {
                StreamWriter syrupsFile = File.CreateText("syrups.txt");
                StreamWriter flavorsFile = File.CreateText("flavors.txt");
                syrupsFile.Close();
                flavorsFile.Close();
                populateComboBox(removeSyrupComboBox, "syrups.txt");
                populateComboBox(removeFlavorComboBox, "flavors.txt");
                populateComboBox(flavorsComboBox, "flavors.txt");
                populateSyrupsList("syrups.txt");
                countFlavorsLabel.Text = "";
                countSyrupsLabel.Text = "";
            }
        }

        private void aboutButton_Click(object sender, EventArgs e)
        {
            AboutForm aboutForm = new AboutForm();
            aboutForm.ShowDialog();
        }
    }
}
