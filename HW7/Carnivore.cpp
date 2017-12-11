#include <iostream>
#include <string>
#include "Animal.h"
#include "Carnivore.h"

using namespace std;


		Carnivore::Carnivore():Animal("Carnivore", "Meat"){

			cout << "This is Carnivore constructor" << endl;
			
		}

		Carnivore::~Carnivore(){cout<<"";}

		void Carnivore::getInfo(){

			cout << "I am a " << name <<endl;

			Animal::getInfo();

		}

		void Carnivore::setName(string name){

			this->name = name;

		}

