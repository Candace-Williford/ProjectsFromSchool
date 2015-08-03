using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace CoffeeShop
{
    public partial class SplashScreen : Form
    {
        public SplashScreen()
        {
            InitializeComponent();
        }

        private void timer_Tick(object sender, EventArgs e)
        {
            timer.Interval -= 1;

            if (timer.Interval <= 1)
            {
                timer.Stop();
                this.Close();
            }
        }

        private void SplashScreen_Load(object sender, EventArgs e)
        {
            timer.Start();
        }
    }
}
