namespace TicketCalculator
{
    partial class ticketCalculatorForm
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
            this.violatorGroupBox = new System.Windows.Forms.GroupBox();
            this.seniorCheckbox = new System.Windows.Forms.CheckBox();
            this.employmentTypeGroupBox = new System.Windows.Forms.GroupBox();
            this.partTimeRadioButton = new System.Windows.Forms.RadioButton();
            this.fullTimeRadioButton = new System.Windows.Forms.RadioButton();
            this.facultyAndStaffRadioButton = new System.Windows.Forms.RadioButton();
            this.studentRadioButton = new System.Windows.Forms.RadioButton();
            this.visitorRadioButton = new System.Windows.Forms.RadioButton();
            this.speedPromptLabel = new System.Windows.Forms.Label();
            this.speedClockedTextBox = new System.Windows.Forms.TextBox();
            this.speedLimitInfoLabel = new System.Windows.Forms.Label();
            this.overLimitLabel = new System.Windows.Forms.Label();
            this.overLimitCalculatedLabel = new System.Windows.Forms.Label();
            this.ticketAmountPromptLabel = new System.Windows.Forms.Label();
            this.ticketAmountLabel = new System.Windows.Forms.Label();
            this.calculateButton = new System.Windows.Forms.Button();
            this.exitButton = new System.Windows.Forms.Button();
            this.violatorGroupBox.SuspendLayout();
            this.employmentTypeGroupBox.SuspendLayout();
            this.SuspendLayout();
            // 
            // violatorGroupBox
            // 
            this.violatorGroupBox.Controls.Add(this.seniorCheckbox);
            this.violatorGroupBox.Controls.Add(this.employmentTypeGroupBox);
            this.violatorGroupBox.Controls.Add(this.facultyAndStaffRadioButton);
            this.violatorGroupBox.Controls.Add(this.studentRadioButton);
            this.violatorGroupBox.Controls.Add(this.visitorRadioButton);
            this.violatorGroupBox.Location = new System.Drawing.Point(72, 53);
            this.violatorGroupBox.Name = "violatorGroupBox";
            this.violatorGroupBox.Size = new System.Drawing.Size(173, 184);
            this.violatorGroupBox.TabIndex = 0;
            this.violatorGroupBox.TabStop = false;
            this.violatorGroupBox.Text = "Select type of Violator";
            // 
            // seniorCheckbox
            // 
            this.seniorCheckbox.AutoSize = true;
            this.seniorCheckbox.Location = new System.Drawing.Point(37, 68);
            this.seniorCheckbox.Name = "seniorCheckbox";
            this.seniorCheckbox.Size = new System.Drawing.Size(56, 17);
            this.seniorCheckbox.TabIndex = 4;
            this.seniorCheckbox.Text = "Senior";
            this.seniorCheckbox.UseVisualStyleBackColor = true;
            // 
            // employmentTypeGroupBox
            // 
            this.employmentTypeGroupBox.Controls.Add(this.partTimeRadioButton);
            this.employmentTypeGroupBox.Controls.Add(this.fullTimeRadioButton);
            this.employmentTypeGroupBox.Location = new System.Drawing.Point(37, 114);
            this.employmentTypeGroupBox.Name = "employmentTypeGroupBox";
            this.employmentTypeGroupBox.Size = new System.Drawing.Size(136, 70);
            this.employmentTypeGroupBox.TabIndex = 3;
            this.employmentTypeGroupBox.TabStop = false;
            this.employmentTypeGroupBox.Text = "Select employment type";
            // 
            // partTimeRadioButton
            // 
            this.partTimeRadioButton.AutoSize = true;
            this.partTimeRadioButton.Location = new System.Drawing.Point(21, 19);
            this.partTimeRadioButton.Name = "partTimeRadioButton";
            this.partTimeRadioButton.Size = new System.Drawing.Size(66, 17);
            this.partTimeRadioButton.TabIndex = 4;
            this.partTimeRadioButton.TabStop = true;
            this.partTimeRadioButton.Text = "Part-time";
            this.partTimeRadioButton.UseVisualStyleBackColor = true;
            // 
            // fullTimeRadioButton
            // 
            this.fullTimeRadioButton.AutoSize = true;
            this.fullTimeRadioButton.Location = new System.Drawing.Point(21, 42);
            this.fullTimeRadioButton.Name = "fullTimeRadioButton";
            this.fullTimeRadioButton.Size = new System.Drawing.Size(63, 17);
            this.fullTimeRadioButton.TabIndex = 3;
            this.fullTimeRadioButton.TabStop = true;
            this.fullTimeRadioButton.Text = "Full-time";
            this.fullTimeRadioButton.UseVisualStyleBackColor = true;
            // 
            // facultyAndStaffRadioButton
            // 
            this.facultyAndStaffRadioButton.AutoSize = true;
            this.facultyAndStaffRadioButton.Location = new System.Drawing.Point(22, 91);
            this.facultyAndStaffRadioButton.Name = "facultyAndStaffRadioButton";
            this.facultyAndStaffRadioButton.Size = new System.Drawing.Size(105, 17);
            this.facultyAndStaffRadioButton.TabIndex = 2;
            this.facultyAndStaffRadioButton.TabStop = true;
            this.facultyAndStaffRadioButton.Text = "Faculty and Staff";
            this.facultyAndStaffRadioButton.UseVisualStyleBackColor = true;
            this.facultyAndStaffRadioButton.CheckedChanged += new System.EventHandler(this.facultyAndStaffRadioButton_CheckedChanged);
            // 
            // studentRadioButton
            // 
            this.studentRadioButton.AutoSize = true;
            this.studentRadioButton.Location = new System.Drawing.Point(22, 44);
            this.studentRadioButton.Name = "studentRadioButton";
            this.studentRadioButton.Size = new System.Drawing.Size(62, 17);
            this.studentRadioButton.TabIndex = 1;
            this.studentRadioButton.TabStop = true;
            this.studentRadioButton.Text = "Student";
            this.studentRadioButton.UseVisualStyleBackColor = true;
            this.studentRadioButton.CheckedChanged += new System.EventHandler(this.studentRadioButton_CheckedChanged);
            // 
            // visitorRadioButton
            // 
            this.visitorRadioButton.AutoSize = true;
            this.visitorRadioButton.Location = new System.Drawing.Point(22, 20);
            this.visitorRadioButton.Name = "visitorRadioButton";
            this.visitorRadioButton.Size = new System.Drawing.Size(53, 17);
            this.visitorRadioButton.TabIndex = 0;
            this.visitorRadioButton.TabStop = true;
            this.visitorRadioButton.Text = "Visitor";
            this.visitorRadioButton.UseVisualStyleBackColor = true;
            // 
            // speedPromptLabel
            // 
            this.speedPromptLabel.AutoSize = true;
            this.speedPromptLabel.Location = new System.Drawing.Point(81, 246);
            this.speedPromptLabel.Name = "speedPromptLabel";
            this.speedPromptLabel.Size = new System.Drawing.Size(108, 13);
            this.speedPromptLabel.TabIndex = 1;
            this.speedPromptLabel.Text = "Enter Speed Clocked";
            // 
            // speedClockedTextBox
            // 
            this.speedClockedTextBox.Location = new System.Drawing.Point(195, 243);
            this.speedClockedTextBox.Name = "speedClockedTextBox";
            this.speedClockedTextBox.Size = new System.Drawing.Size(100, 20);
            this.speedClockedTextBox.TabIndex = 2;
            // 
            // speedLimitInfoLabel
            // 
            this.speedLimitInfoLabel.AutoSize = true;
            this.speedLimitInfoLabel.Font = new System.Drawing.Font("Microsoft Sans Serif", 14F);
            this.speedLimitInfoLabel.Location = new System.Drawing.Point(90, 26);
            this.speedLimitInfoLabel.Name = "speedLimitInfoLabel";
            this.speedLimitInfoLabel.Size = new System.Drawing.Size(146, 24);
            this.speedLimitInfoLabel.TabIndex = 3;
            this.speedLimitInfoLabel.Text = "Speed limit is 35";
            // 
            // overLimitLabel
            // 
            this.overLimitLabel.AutoSize = true;
            this.overLimitLabel.Location = new System.Drawing.Point(10, 278);
            this.overLimitLabel.Name = "overLimitLabel";
            this.overLimitLabel.Size = new System.Drawing.Size(179, 13);
            this.overLimitLabel.TabIndex = 4;
            this.overLimitLabel.Text = "Violators Miles Over the Speed Limit:";
            // 
            // overLimitCalculatedLabel
            // 
            this.overLimitCalculatedLabel.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.overLimitCalculatedLabel.Location = new System.Drawing.Point(195, 273);
            this.overLimitCalculatedLabel.Name = "overLimitCalculatedLabel";
            this.overLimitCalculatedLabel.Size = new System.Drawing.Size(100, 23);
            this.overLimitCalculatedLabel.TabIndex = 5;
            this.overLimitCalculatedLabel.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // ticketAmountPromptLabel
            // 
            this.ticketAmountPromptLabel.AutoSize = true;
            this.ticketAmountPromptLabel.Location = new System.Drawing.Point(94, 310);
            this.ticketAmountPromptLabel.Name = "ticketAmountPromptLabel";
            this.ticketAmountPromptLabel.Size = new System.Drawing.Size(95, 13);
            this.ticketAmountPromptLabel.TabIndex = 6;
            this.ticketAmountPromptLabel.Text = "Violator\'s Ticket is:";
            // 
            // ticketAmountLabel
            // 
            this.ticketAmountLabel.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.ticketAmountLabel.Location = new System.Drawing.Point(195, 305);
            this.ticketAmountLabel.Name = "ticketAmountLabel";
            this.ticketAmountLabel.Size = new System.Drawing.Size(100, 23);
            this.ticketAmountLabel.TabIndex = 7;
            this.ticketAmountLabel.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // calculateButton
            // 
            this.calculateButton.Location = new System.Drawing.Point(13, 352);
            this.calculateButton.Name = "calculateButton";
            this.calculateButton.Size = new System.Drawing.Size(75, 23);
            this.calculateButton.TabIndex = 8;
            this.calculateButton.Text = "Calculate";
            this.calculateButton.UseVisualStyleBackColor = true;
            this.calculateButton.Click += new System.EventHandler(this.calculateButton_Click);
            // 
            // exitButton
            // 
            this.exitButton.Location = new System.Drawing.Point(220, 352);
            this.exitButton.Name = "exitButton";
            this.exitButton.Size = new System.Drawing.Size(75, 23);
            this.exitButton.TabIndex = 9;
            this.exitButton.Text = "Exit";
            this.exitButton.UseVisualStyleBackColor = true;
            this.exitButton.Click += new System.EventHandler(this.exitButton_Click);
            // 
            // ticketCalculatorForm
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(327, 399);
            this.Controls.Add(this.exitButton);
            this.Controls.Add(this.calculateButton);
            this.Controls.Add(this.ticketAmountLabel);
            this.Controls.Add(this.ticketAmountPromptLabel);
            this.Controls.Add(this.overLimitCalculatedLabel);
            this.Controls.Add(this.overLimitLabel);
            this.Controls.Add(this.speedLimitInfoLabel);
            this.Controls.Add(this.speedClockedTextBox);
            this.Controls.Add(this.speedPromptLabel);
            this.Controls.Add(this.violatorGroupBox);
            this.Name = "ticketCalculatorForm";
            this.Text = "Ticket Calculator";
            this.Load += new System.EventHandler(this.Form1_Load);
            this.violatorGroupBox.ResumeLayout(false);
            this.violatorGroupBox.PerformLayout();
            this.employmentTypeGroupBox.ResumeLayout(false);
            this.employmentTypeGroupBox.PerformLayout();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.GroupBox violatorGroupBox;
        private System.Windows.Forms.GroupBox employmentTypeGroupBox;
        private System.Windows.Forms.RadioButton partTimeRadioButton;
        private System.Windows.Forms.RadioButton fullTimeRadioButton;
        private System.Windows.Forms.RadioButton facultyAndStaffRadioButton;
        private System.Windows.Forms.RadioButton studentRadioButton;
        private System.Windows.Forms.RadioButton visitorRadioButton;
        private System.Windows.Forms.Label speedPromptLabel;
        private System.Windows.Forms.TextBox speedClockedTextBox;
        private System.Windows.Forms.Label speedLimitInfoLabel;
        private System.Windows.Forms.Label overLimitLabel;
        private System.Windows.Forms.Label overLimitCalculatedLabel;
        private System.Windows.Forms.Label ticketAmountPromptLabel;
        private System.Windows.Forms.Label ticketAmountLabel;
        private System.Windows.Forms.Button calculateButton;
        private System.Windows.Forms.Button exitButton;
        private System.Windows.Forms.CheckBox seniorCheckbox;
    }
}

