using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Drawing.Imaging;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WindowsFormsApplication2
{
    public partial class Form1 : Form
    {
        Bitmap bmp;
        int x, y;
        int[,] arrayXY = new int[10, 5];
        Color[] tipoColores = new Color[6];
        int posicion = 0;
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            //controlar los fallos
            openFileDialog1.Filter = "Todos|*.*|Archivos JPGE|*.jpg";
            openFileDialog1.FileName = "";
            openFileDialog1.ShowDialog();
            bmp = new Bitmap(openFileDialog1.FileName);
            pictureBox1.Image = bmp;

            //
            tipoColores[0] = Color.Aqua;
            tipoColores[1] = Color.Beige;
            tipoColores[2] = Color.Crimson;
            tipoColores[3] = Color.DeepPink;
            tipoColores[4] = Color.Gray;
            tipoColores[5] = Color.Gold;
            //
        }



        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void button3_Click(object sender, EventArgs e)
        {
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            for (int i = 0; i < bmp.Width; i++)
            {
                for (int j = 0; j < bmp.Height; j++)
                {
                    c = bmp.GetPixel(i, j);
                    bmp2.SetPixel(i, j, Color.FromArgb(c.R, 0, 0));

                }
                pictureBox1.Image = bmp2;
            }
        }

        private void button4_Click(object sender, EventArgs e)
        {
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            for (int i = 0; i < bmp.Width; i++)
            {
                for (int j = 0; j < bmp.Height; j++)
                {
                    c = bmp.GetPixel(i, j);
                    bmp2.SetPixel(i, j, Color.FromArgb(0, 0, c.R));

                }
                pictureBox1.Image = bmp2;
            }
        }

        private void button5_Click(object sender, EventArgs e)
        {
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            for (int i = 0; i < bmp.Width; i++)
            {
                for (int j = 0; j < bmp.Height; j++)
                {
                    c = bmp.GetPixel(i, j);
                    bmp2.SetPixel(i, j, Color.FromArgb(0, 0, c.R));

                }
                pictureBox1.Image = bmp2;
            }
        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {

        }

        private void pictureBox1_MouseClick(object sender, MouseEventArgs e)
        {
            int mr = 0, mg = 0, mb = 0;
            x = e.X;
            y = e.Y;
            Color c = new Color();
            for (int i = x; i < x + 10; i++)
            {
                for (int j = y; j < y + 10; j++)
                {
                    c = bmp.GetPixel(i, j);
                    mr = mr + c.R;
                    mg = mg + c.G;
                    mb = mb + c.B;

                }
            }
            mr = mr / 100;
            mg = mg / 100;
            mb = mb / 100;

            arrayXY[posicion, 0] = x;
            arrayXY[posicion, 1] = y;
            arrayXY[posicion, 2] = mr;
            arrayXY[posicion, 3] = mg;
            arrayXY[posicion, 4] = mb;
            posicion++;
            enviar(x, y);

        }

        public void enviar(int x, int y)
        {


            for (int i = 0; i < posicion; i++)
            {
                for (int j = 0; j < 5; j++)
                {
                    Console.Write(arrayXY[i, j] + ", ");
                }
                Console.WriteLine();
            }
            Console.WriteLine();

        }

        private void button6_Click(object sender, EventArgs e)
        {
            int mrn = 0, mgn = 0, mbn = 0;
            int mr = 0, mg = 0, mb = 0;
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            for (int i = 0; i < posicion; i++)
            {
                
                Color c = new Color();
                mr = arrayXY[i, 2];
                mg = arrayXY[i, 3];
                mb = arrayXY[i, 4];
                Color tipoColor = tipoColores[i % 6];
                bmp = colorear(c, bmp2, 0, 0, 0, mr, mg, mb, tipoColor);
                
            }
            pictureBox1.Image = bmp2;
           
        }

        public Bitmap colorear(Color c, Bitmap bmp2, int mrn, int mgn, int mbn, int mr, int mg, int mb, Color tipoColor)
        {

            for (int i = 0; i < bmp.Width - 10; i = i + 10)
            {
                for (int j = 0; j < bmp.Height - 10; j = j + 10)
                {

                    for (int i2 = i; i2 < i + 10; i2++)
                    {
                        for (int j2 = j; j2 < j + 10; j2++)
                        {
                            c = bmp.GetPixel(i2, j2);
                            mrn = mrn + c.R;
                            mgn = mgn + c.G;
                            mbn = mbn + c.B;
                        }
                    }
                    mrn = mrn / 100;
                    mgn = mgn / 100;
                    mbn = mbn / 100;
                    if ((mr - 10 <= mrn) && (mrn - 10 <= mr + 10) &&
                      (mg - 10 <= mgn) && (mgn - 10 <= mg + 10) &&
                      (mb - 10 <= mbn) && (mbn - 10 <= mb + 10))
                    {
                        for (int i2 = i; i2 < i + 10; i2++)
                        {
                            for (int j2 = j; j2 < j + 10; j2++)
                            {
                                bmp2.SetPixel(i2, j2, tipoColor);
                            }
                        }

                    }
                    else
                    {
                        for (int i2 = i; i2 < i + 10; i2++)
                        {
                            for (int j2 = j; j2 < j + 10; j2++)
                            {
                                c = bmp.GetPixel(i2, j2);
                                bmp2.SetPixel(i2, j2, Color.FromArgb(c.R, c.G, c.B));
                                


                            }
                        }
                    }





                }
            }
            return bmp2;

        }
    }
}
