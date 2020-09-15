#include <iostream>
#include <conio.h>
#include <string.h>

using namespace std;


void LoginScreen();
void body();
int main() {
	
	cout << "hola";
	system("cls");

	LoginScreen();
	_getch();
	return 0;
}

void LoginScreen() {
	char username[20], pwd[20];
	cout << "Login" << endl;
	cout << "Admin:";
	cin >> username;
	cout << "Password:";
	cin >> pwd;
	if (strcmp(username, "kist") == 0 & strcmp(pwd, "1234") == 0) {

		system("cls");
		cout << "Access Granted" << endl;

		body();

	}
	else {
		cout << "Something's wrong, try again" << endl;
	}

}

void body() {
	int dec;
	while (1) {
		cout << "Options:" << endl;
		cout << "\n1:Students\n2:Books\n0:Exit\nYour Choice:";
		cin >> dec;
		if (dec == 1) {
			cout << "1";
		}
		else if (dec == 2) {
			cout << "2";
		}
		else if (dec == 0) {
			exit(0);
		}
		else {
			cout << "you screwed up";
		}
		
	}
}
