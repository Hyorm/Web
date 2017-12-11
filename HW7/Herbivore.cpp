#include <iostream>
#include <string>
#include "Animal.h"
#include "Herbivore.h"

using namespace std;


		Herbivore::Herbivore():Animal("Herbivore", "Grass"){

			cout << "This is Herbivore constructor" << endl;
			
		}

		Herbivore::~Herbivore(){cout<<"";}

		void Herbivore::getInfo(){

			cout << "I am a " << name <<endl;

			Animal::getInfo();

		}

		void Herbivore::setName(string name){

			this->name = name;

		}

