<?php

/* 
  Project: Arduino PHP Control - A serial comunication for Arduino board
  Version: 0.0.1
  Author: Andrea Cirillo <sabageek.blogspot.com>
  Copyright: 2012 Andrea Cirillo
  License: GPL-3
  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.
  Required the PHP Serial class by Rémy Sanchez <thenux@gmail.com>
*/

class SerialConnection {

	public function getConnection($port, $rate) {
		require ("php_serial.class.php");
		//check the GET action var to see if an action is to be performed
		//Initialize the class
		$serial = new phpSerial();
		//Specify the serial port to use... in this case COM1
		$serial -> deviceSet($port);
		//Set the serial port parameters. The documentation says 9600 8-N-1, so
		$serial -> confBaudRate($rate);
		//$serial -> confParity("none");
		//Parity (this is the "N" in "8-N-1")
		//$serial -> confCharacterLength(8);
		//Character length (this is the "8" in "8-N-1")
		//$serial -> confStopBits(1);
		//Stop bits (this is the "1" in "8-N-1")
		//$serial -> confFlowControl("none");
		//Device does not support flow control of any kind,
		//so set it to none.
		//Now we "open" the serial port so we can write to it
		$serial -> deviceOpen();
		return $serial;
	}

	public function sendSerial($serial, $message) {
		$serial -> sendMessage($message);
	}

	public function readSerial($serial) {
		$done = FALSE;
		$line = "";
		while (!$done) {
			$read -> $serial -> readPort();
			for ($i = 0; $i < strlen($read); $i++) {
				if ($read[$i] == '\n') {
					$done = TRUE;
					$line = "";
				} else
					$line .= $read[$i];
			}
		}
	}

	public function closeConnection($serial) {
		//We're done, so close the serial port again
		$serial -> deviceClose();
	}

}
?>