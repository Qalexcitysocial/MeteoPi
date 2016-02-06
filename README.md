# MeteoPi
Meteo station with RpiZero

How Build your Meteo station and Automation Garden with RaspberryPi

Elements to use in this Project. 

1. RaspberryPi Zero
2. Sensor  DHT11_11 
3. SainSmart 8 Channel DC 5V Relay
4. DC12V 4/5 Inch Electric Solenoid Valve for Water Air

Just Download the project in to you rpi and follow this steps. 

clone this git clone git://git.drogon.net/wiringPi to control output / input in your rpi

1. Copy the App folder into your /var/www/html/
2. Create in mysql a datebase call temperature 

Connecting the sensor
For the puropose of this poject we will use a sensor DHT11, which measures both
temperature and humidity, but for the sake of easier connections, we will use an off-the-shelf module called Keyes DHT11 which contains these sensor

Using this sensor, module instead of the sensors itself will enable us to connect the sensor to the Pi using only three jumnper wires, and without a breadboard or resistor, in my case I am using a breadboard for test and document this project.

There is another advantage of using this module instead of the sensors: the sensors provide analog data that the Pi cannot handle. Pi is capable of handling digital information on it's GPIO ports.
The DHT11 module does the conversion for us.

Now, we need to connect the GND put put from the sensor module to Pi's GPIO Ground, 5v output to Pi's 5v pin and Data pi's GPIO4 pin, follow  the diagram.

The next step is read the values these sensor provide. for this porpouse, we will use a widely used library from Adafruit, which is specially designe for these kinds of sensors developed the Python programming language. before we can use ir, we need to install some software component to our Raspberry.
sudo apt-get install build-essential python-dev

The sensor library itself is on GitHub.
git clone https://github.com/adafruit/Adafruit_Python_DHT.git

when we download the library, go to Adafruit_Python_DHT

next, you need to actually install the sensor library using the following command:

sudo python setup.py install

Here, we use the standard Python third-party module install functionality, which installs the Adafruit library globally onto your system at the standard Python library install location, /usr/loalc/lib/python2.7/dist-packages/. this is why we need superuser privileges, which we can get using sudo command

Now We are ready to begin reading measurements from the sensor. here a example.

sudo ./examples/AdafruitDHT.py 11 7 ( where 11 is the descriptor of the sensor DHT11 sensor and 7 GPIO output pin 7)

you should get Temp = 25*C Humidity = 36.0%


INSTALLING the DB 

After verifying that sensor and connections to the Pi work, we will save the measurements in a database. 
the database we will use is MySQL, Use the following command to install MySQL in the Pi. 
