namespace CoffeeShop
{
    partial class CoffeeShopForm
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.coffeeShopTabControl = new System.Windows.Forms.TabControl();
            this.changeSyrupsTab = new System.Windows.Forms.TabPage();
            this.countSyrupsLabel = new System.Windows.Forms.Label();
            this.removeSyrupComboBox = new System.Windows.Forms.ComboBox();
            this.addSyrupTextBox = new System.Windows.Forms.TextBox();
            this.countSyrupsButton = new System.Windows.Forms.Button();
            this.clearSyrupsButton = new System.Windows.Forms.Button();
            this.removeSyrupButton = new System.Windows.Forms.Button();
            this.addSyrupButton = new System.Windows.Forms.Button();
            this.changeFlavorsTab = new System.Windows.Forms.TabPage();
            this.browseFlavorsAndSyrupsTab = new System.Windows.Forms.TabPage();
            this.syrupsLabel = new System.Windows.Forms.Label();
            this.syrupsListBox = new System.Windows.Forms.ListBox();
            this.flavorsLabel = new System.Windows.Forms.Label();
            this.flavorsComboBox = new System.Windows.Forms.ComboBox();
            this.generalTab = new System.Windows.Forms.TabPage();
            this.exitButton = new System.Windows.Forms.Button();
            this.aboutButton = new System.Windows.Forms.Button();
            this.clearButton = new System.Windows.Forms.Button();
            this.countFlavorsLabel = new System.Windows.Forms.Label();
            this.removeFlavorComboBox = new System.Windows.Forms.ComboBox();
            this.addFlavorTextBox = new System.Windows.Forms.TextBox();
            this.countFlavorsButton = new System.Windows.Forms.Button();
            this.clearFlavorsButton = new System.Windows.Forms.Button();
            this.removeFlavorButton = new System.Windows.Forms.Button();
            this.addFlavorButton = new System.Windows.Forms.Button();
            this.label1 = new System.Windows.Forms.Label();
            this.coffeeShopTabControl.SuspendLayout();
            this.changeSyrupsTab.SuspendLayout();
            this.changeFlavorsTab.SuspendLayout();
            this.browseFlavorsAndSyrupsTab.SuspendLayout();
            this.generalTab.SuspendLayout();
            this.SuspendLayout();
            // 
            // coffeeShopTabControl
            // 
            this.coffeeShopTabControl.Controls.Add(this.changeSyrupsTab);
            this.coffeeShopTabControl.Controls.Add(this.changeFlavorsTab);
            this.coffeeShopTabControl.Controls.Add(this.browseFlavorsAndSyrupsTab);
            this.coffeeShopTabControl.Controls.Add(this.generalTab);
            this.coffeeShopTabControl.Location = new System.Drawing.Point(12, 12);
            this.coffeeShopTabControl.Name = "coffeeShopTabControl";
            this.coffeeShopTabControl.SelectedIndex = 0;
            this.coffeeShopTabControl.Size = new System.Drawing.Size(374, 203);
            this.coffeeShopTabControl.TabIndex = 4;
            // 
            // changeSyrupsTab
            // 
            this.changeSyrupsTab.Controls.Add(this.countSyrupsLabel);
            this.changeSyrupsTab.Controls.Add(this.removeSyrupComboBox);
            this.changeSyrupsTab.Controls.Add(this.addSyrupTextBox);
            this.changeSyrupsTab.Controls.Add(this.countSyrupsButton);
            this.changeSyrupsTab.Controls.Add(this.clearSyrupsButton);
            this.changeSyrupsTab.Controls.Add(this.removeSyrupButton);
            this.changeSyrupsTab.Controls.Add(this.addSyrupButton);
            this.changeSyrupsTab.Location = new System.Drawing.Point(4, 22);
            this.changeSyrupsTab.Name = "changeSyrupsTab";
            this.changeSyrupsTab.Padding = new System.Windows.Forms.Padding(3);
            this.changeSyrupsTab.Size = new System.Drawing.Size(366, 177);
            this.changeSyrupsTab.TabIndex = 0;
            this.changeSyrupsTab.Text = "Change Syrups";
            this.changeSyrupsTab.UseVisualStyleBackColor = true;
            // 
            // countSyrupsLabel
            // 
            this.countSyrupsLabel.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.countSyrupsLabel.Location = new System.Drawing.Point(27, 97);
            this.countSyrupsLabel.Name = "countSyrupsLabel";
            this.countSyrupsLabel.Size = new System.Drawing.Size(187, 23);
            this.countSyrupsLabel.TabIndex = 13;
            this.countSyrupsLabel.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // removeSyrupComboBox
            // 
            this.removeSyrupComboBox.FormattingEnabled = true;
            this.removeSyrupComboBox.Location = new System.Drawing.Point(27, 61);
            this.removeSyrupComboBox.Name = "removeSyrupComboBox";
            this.removeSyrupComboBox.Size = new System.Drawing.Size(187, 21);
            this.removeSyrupComboBox.TabIndex = 12;
            // 
            // addSyrupTextBox
            // 
            this.addSyrupTextBox.Location = new System.Drawing.Point(27, 26);
            this.addSyrupTextBox.Name = "addSyrupTextBox";
            this.addSyrupTextBox.Size = new System.Drawing.Size(187, 20);
            this.addSyrupTextBox.TabIndex = 11;
            // 
            // countSyrupsButton
            // 
            this.countSyrupsButton.Location = new System.Drawing.Point(220, 97);
            this.countSyrupsButton.Name = "countSyrupsButton";
            this.countSyrupsButton.Size = new System.Drawing.Size(121, 23);
            this.countSyrupsButton.TabIndex = 10;
            this.countSyrupsButton.Text = "Count Syrups";
            this.countSyrupsButton.UseVisualStyleBackColor = true;
            this.countSyrupsButton.Click += new System.EventHandler(this.countSyrupsButton_Click);
            // 
            // clearSyrupsButton
            // 
            this.clearSyrupsButton.Location = new System.Drawing.Point(27, 135);
            this.clearSyrupsButton.Name = "clearSyrupsButton";
            this.clearSyrupsButton.Size = new System.Drawing.Size(314, 23);
            this.clearSyrupsButton.TabIndex = 9;
            this.clearSyrupsButton.Text = "Clear All Syrups";
            this.clearSyrupsButton.UseVisualStyleBackColor = true;
            this.clearSyrupsButton.Click += new System.EventHandler(this.clearSyrupsButton_Click);
            // 
            // removeSyrupButton
            // 
            this.removeSyrupButton.Location = new System.Drawing.Point(220, 61);
            this.removeSyrupButton.Name = "removeSyrupButton";
            this.removeSyrupButton.Size = new System.Drawing.Size(121, 21);
            this.removeSyrupButton.TabIndex = 8;
            this.removeSyrupButton.Text = "Remove Coffee Syrup";
            this.removeSyrupButton.UseVisualStyleBackColor = true;
            this.removeSyrupButton.Click += new System.EventHandler(this.removeSyrupButton_Click);
            // 
            // addSyrupButton
            // 
            this.addSyrupButton.Location = new System.Drawing.Point(220, 26);
            this.addSyrupButton.Name = "addSyrupButton";
            this.addSyrupButton.Size = new System.Drawing.Size(121, 20);
            this.addSyrupButton.TabIndex = 7;
            this.addSyrupButton.Text = "Add Coffee Syrup";
            this.addSyrupButton.UseVisualStyleBackColor = true;
            this.addSyrupButton.Click += new System.EventHandler(this.addSyrupButton_Click);
            // 
            // changeFlavorsTab
            // 
            this.changeFlavorsTab.Controls.Add(this.countFlavorsLabel);
            this.changeFlavorsTab.Controls.Add(this.removeFlavorComboBox);
            this.changeFlavorsTab.Controls.Add(this.addFlavorTextBox);
            this.changeFlavorsTab.Controls.Add(this.countFlavorsButton);
            this.changeFlavorsTab.Controls.Add(this.clearFlavorsButton);
            this.changeFlavorsTab.Controls.Add(this.removeFlavorButton);
            this.changeFlavorsTab.Controls.Add(this.addFlavorButton);
            this.changeFlavorsTab.Location = new System.Drawing.Point(4, 22);
            this.changeFlavorsTab.Name = "changeFlavorsTab";
            this.changeFlavorsTab.Padding = new System.Windows.Forms.Padding(3);
            this.changeFlavorsTab.Size = new System.Drawing.Size(366, 177);
            this.changeFlavorsTab.TabIndex = 1;
            this.changeFlavorsTab.Text = "Change Flavors";
            this.changeFlavorsTab.UseVisualStyleBackColor = true;
            // 
            // browseFlavorsAndSyrupsTab
            // 
            this.browseFlavorsAndSyrupsTab.Controls.Add(this.syrupsLabel);
            this.browseFlavorsAndSyrupsTab.Controls.Add(this.syrupsListBox);
            this.browseFlavorsAndSyrupsTab.Controls.Add(this.flavorsLabel);
            this.browseFlavorsAndSyrupsTab.Controls.Add(this.flavorsComboBox);
            this.browseFlavorsAndSyrupsTab.Location = new System.Drawing.Point(4, 22);
            this.browseFlavorsAndSyrupsTab.Name = "browseFlavorsAndSyrupsTab";
            this.browseFlavorsAndSyrupsTab.Size = new System.Drawing.Size(366, 177);
            this.browseFlavorsAndSyrupsTab.TabIndex = 2;
            this.browseFlavorsAndSyrupsTab.Text = "Browse Flavors and Syrups";
            this.browseFlavorsAndSyrupsTab.UseVisualStyleBackColor = true;
            // 
            // syrupsLabel
            // 
            this.syrupsLabel.AutoSize = true;
            this.syrupsLabel.Location = new System.Drawing.Point(198, 22);
            this.syrupsLabel.Name = "syrupsLabel";
            this.syrupsLabel.Size = new System.Drawing.Size(39, 13);
            this.syrupsLabel.TabIndex = 7;
            this.syrupsLabel.Text = "Syrups";
            // 
            // syrupsListBox
            // 
            this.syrupsListBox.FormattingEnabled = true;
            this.syrupsListBox.Location = new System.Drawing.Point(198, 41);
            this.syrupsListBox.Name = "syrupsListBox";
            this.syrupsListBox.Size = new System.Drawing.Size(120, 95);
            this.syrupsListBox.TabIndex = 6;
            // 
            // flavorsLabel
            // 
            this.flavorsLabel.AutoSize = true;
            this.flavorsLabel.Location = new System.Drawing.Point(25, 22);
            this.flavorsLabel.Name = "flavorsLabel";
            this.flavorsLabel.Size = new System.Drawing.Size(41, 13);
            this.flavorsLabel.TabIndex = 5;
            this.flavorsLabel.Text = "Flavors";
            // 
            // flavorsComboBox
            // 
            this.flavorsComboBox.FormattingEnabled = true;
            this.flavorsComboBox.Location = new System.Drawing.Point(25, 41);
            this.flavorsComboBox.Name = "flavorsComboBox";
            this.flavorsComboBox.Size = new System.Drawing.Size(121, 21);
            this.flavorsComboBox.TabIndex = 4;
            // 
            // generalTab
            // 
            this.generalTab.Controls.Add(this.label1);
            this.generalTab.Controls.Add(this.exitButton);
            this.generalTab.Controls.Add(this.aboutButton);
            this.generalTab.Controls.Add(this.clearButton);
            this.generalTab.Location = new System.Drawing.Point(4, 22);
            this.generalTab.Name = "generalTab";
            this.generalTab.Size = new System.Drawing.Size(366, 177);
            this.generalTab.TabIndex = 3;
            this.generalTab.Text = "General";
            this.generalTab.UseVisualStyleBackColor = true;
            // 
            // exitButton
            // 
            this.exitButton.Location = new System.Drawing.Point(36, 109);
            this.exitButton.Name = "exitButton";
            this.exitButton.Size = new System.Drawing.Size(292, 23);
            this.exitButton.TabIndex = 5;
            this.exitButton.Text = "Exit";
            this.exitButton.UseVisualStyleBackColor = true;
            this.exitButton.Click += new System.EventHandler(this.exitButton_Click);
            // 
            // aboutButton
            // 
            this.aboutButton.Location = new System.Drawing.Point(185, 19);
            this.aboutButton.Name = "aboutButton";
            this.aboutButton.Size = new System.Drawing.Size(143, 23);
            this.aboutButton.TabIndex = 4;
            this.aboutButton.Text = "About";
            this.aboutButton.UseVisualStyleBackColor = true;
            this.aboutButton.Click += new System.EventHandler(this.aboutButton_Click);
            // 
            // clearButton
            // 
            this.clearButton.Location = new System.Drawing.Point(36, 19);
            this.clearButton.Name = "clearButton";
            this.clearButton.Size = new System.Drawing.Size(143, 23);
            this.clearButton.TabIndex = 3;
            this.clearButton.Text = "Clear";
            this.clearButton.UseVisualStyleBackColor = true;
            this.clearButton.Click += new System.EventHandler(this.clearButton_Click);
            // 
            // countFlavorsLabel
            // 
            this.countFlavorsLabel.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.countFlavorsLabel.Location = new System.Drawing.Point(21, 90);
            this.countFlavorsLabel.Name = "countFlavorsLabel";
            this.countFlavorsLabel.Size = new System.Drawing.Size(187, 23);
            this.countFlavorsLabel.TabIndex = 27;
            this.countFlavorsLabel.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // removeFlavorComboBox
            // 
            this.removeFlavorComboBox.FormattingEnabled = true;
            this.removeFlavorComboBox.Location = new System.Drawing.Point(21, 54);
            this.removeFlavorComboBox.Name = "removeFlavorComboBox";
            this.removeFlavorComboBox.Size = new System.Drawing.Size(187, 21);
            this.removeFlavorComboBox.TabIndex = 26;
            // 
            // addFlavorTextBox
            // 
            this.addFlavorTextBox.Location = new System.Drawing.Point(21, 19);
            this.addFlavorTextBox.Name = "addFlavorTextBox";
            this.addFlavorTextBox.Size = new System.Drawing.Size(187, 20);
            this.addFlavorTextBox.TabIndex = 25;
            // 
            // countFlavorsButton
            // 
            this.countFlavorsButton.Location = new System.Drawing.Point(214, 89);
            this.countFlavorsButton.Name = "countFlavorsButton";
            this.countFlavorsButton.Size = new System.Drawing.Size(121, 23);
            this.countFlavorsButton.TabIndex = 24;
            this.countFlavorsButton.Text = "Count Flavors";
            this.countFlavorsButton.UseVisualStyleBackColor = true;
            this.countFlavorsButton.Click += new System.EventHandler(this.countFlavorsButton_Click);
            // 
            // clearFlavorsButton
            // 
            this.clearFlavorsButton.Location = new System.Drawing.Point(21, 127);
            this.clearFlavorsButton.Name = "clearFlavorsButton";
            this.clearFlavorsButton.Size = new System.Drawing.Size(314, 23);
            this.clearFlavorsButton.TabIndex = 23;
            this.clearFlavorsButton.Text = "Clear Flavors";
            this.clearFlavorsButton.UseVisualStyleBackColor = true;
            this.clearFlavorsButton.Click += new System.EventHandler(this.clearFlavorsButton_Click);
            // 
            // removeFlavorButton
            // 
            this.removeFlavorButton.Location = new System.Drawing.Point(214, 53);
            this.removeFlavorButton.Name = "removeFlavorButton";
            this.removeFlavorButton.Size = new System.Drawing.Size(121, 21);
            this.removeFlavorButton.TabIndex = 22;
            this.removeFlavorButton.Text = "Remove Coffee Flavor";
            this.removeFlavorButton.UseVisualStyleBackColor = true;
            this.removeFlavorButton.Click += new System.EventHandler(this.removeFlavorButton_Click);
            // 
            // addFlavorButton
            // 
            this.addFlavorButton.Location = new System.Drawing.Point(214, 18);
            this.addFlavorButton.Name = "addFlavorButton";
            this.addFlavorButton.Size = new System.Drawing.Size(121, 20);
            this.addFlavorButton.TabIndex = 21;
            this.addFlavorButton.Text = "Add Coffee Flavor";
            this.addFlavorButton.UseVisualStyleBackColor = true;
            this.addFlavorButton.Click += new System.EventHandler(this.addFlavorButton_Click);
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(59, 69);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(245, 13);
            this.label1.TabIndex = 6;
            this.label1.Text = "Use the tab panes above to look through the form.";
            // 
            // CoffeeShopForm
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(401, 233);
            this.Controls.Add(this.coffeeShopTabControl);
            this.Name = "CoffeeShopForm";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Candace\'s Coffee Shop";
            this.Load += new System.EventHandler(this.CoffeeShopForm_Load);
            this.coffeeShopTabControl.ResumeLayout(false);
            this.changeSyrupsTab.ResumeLayout(false);
            this.changeSyrupsTab.PerformLayout();
            this.changeFlavorsTab.ResumeLayout(false);
            this.changeFlavorsTab.PerformLayout();
            this.browseFlavorsAndSyrupsTab.ResumeLayout(false);
            this.browseFlavorsAndSyrupsTab.PerformLayout();
            this.generalTab.ResumeLayout(false);
            this.generalTab.PerformLayout();
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.TabControl coffeeShopTabControl;
        private System.Windows.Forms.TabPage changeSyrupsTab;
        private System.Windows.Forms.TabPage changeFlavorsTab;
        private System.Windows.Forms.TabPage browseFlavorsAndSyrupsTab;
        private System.Windows.Forms.TabPage generalTab;
        private System.Windows.Forms.Label countSyrupsLabel;
        private System.Windows.Forms.ComboBox removeSyrupComboBox;
        private System.Windows.Forms.TextBox addSyrupTextBox;
        private System.Windows.Forms.Button countSyrupsButton;
        private System.Windows.Forms.Button clearSyrupsButton;
        private System.Windows.Forms.Button removeSyrupButton;
        private System.Windows.Forms.Button addSyrupButton;
        private System.Windows.Forms.Label syrupsLabel;
        private System.Windows.Forms.ListBox syrupsListBox;
        private System.Windows.Forms.Label flavorsLabel;
        private System.Windows.Forms.ComboBox flavorsComboBox;
        private System.Windows.Forms.Button exitButton;
        private System.Windows.Forms.Button aboutButton;
        private System.Windows.Forms.Button clearButton;
        private System.Windows.Forms.Label countFlavorsLabel;
        private System.Windows.Forms.ComboBox removeFlavorComboBox;
        private System.Windows.Forms.TextBox addFlavorTextBox;
        private System.Windows.Forms.Button countFlavorsButton;
        private System.Windows.Forms.Button clearFlavorsButton;
        private System.Windows.Forms.Button removeFlavorButton;
        private System.Windows.Forms.Button addFlavorButton;
        private System.Windows.Forms.Label label1;
    }
}