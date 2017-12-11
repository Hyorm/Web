#include "Carnivore.h"
#include "Herbivore.h"
#include <iostream>
#include <string>

using namespace std;

int main(){

	Carnivore animalOne = Carnivore();	

	animalOne.setName("Tiger");
	animalOne.setWeight(80);
	animalOne.setHabitat("Mountain");
	animalOne.setType("axe throwing");
	animalOne.getInfo();

	cout << endl;
	
	Herbivore animalTwo = Herbivore();

	animalTwo.setName("Deer");
	animalTwo.setWeight(40);
	animalTwo.setHabitat("Savanna");
	animalTwo.setType("Juggling");
	animalTwo.getInfo();

	//system("pause");
	return 0;

}
