#include <iostream>
#include <string>
#include "Animal.h"
using namespace std;

		Animal::Animal(string species, string food){

			this->species = species;
			
			this->food = food;

			cout << "This is Animal Class Contructor" << endl;

		}

		string Animal::getSpecies(){

			return this->species;

		}

		string Animal::getHabitat(){

			return this->habitat;

		}

		void Animal::setHabitat(string habitat){

			this->habitat = habitat;

		}

		string Animal::getFood(){

			return this->food;

		}

		string Animal::getType(){

			return this->type;

		}

		void Animal::setType(string type){

			this->type = type;

		}

		int Animal::getWeight(){
		
			return this->weight;

		}

		void Animal::setWeight(int weight){

			this->weight = weight;

		}

		void Animal::getInfo(){
	
			cout<< "I eat "<< food <<endl;
			cout<< "I am a "<< species <<endl;
			cout<< "I weight "<< weight <<endl;
			cout<< "I live in the "<< habitat <<endl;
			cout<<species<< " was fed well with "<< food <<endl;
			cout<<species<< " was trained in "<< type <<endl;

		}

