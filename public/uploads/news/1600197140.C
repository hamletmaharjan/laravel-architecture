#include <stdio.h>
#include <conio.h>
#include <stdlib.h>

struct informations{
    char name[20];
    int id;
    int age;
};
typedef struct informations info;

int palindrome(int arg1);
int armstrong(int arg1);
int reverse(int arg1);
void fibonacci(int arg1);
void record();
int main(){
    int dec,n;
    while(1){
	printf("Program options:\n1:Palindrome\n2:Armstrong\n3:Reverse\n4:Fibonacci\n5:Record\n6:Matrix multiplication\n7:Ascending\n8:Leap year\n9:Convert temperature\nSo what's up:");
	scanf("%d",&dec);
	switch(dec){
	case 1:
	    printf("Enter the number:");
	    scanf("%d",&n);
	    if(n==palindrome(n))
		printf("It is a palindrome number\n");
	    else
		printf("It is not a palindrome number\n");
	    break;
	case 2:
	    printf("Enter the number:");
	    scanf("%d",&n);
	    if(n==armstrong(n))
		printf("It is an armstrong number\n");
	    else
		printf("It is not an armstrong number\n");
	    break;
	case 3:
	    printf("Enter the number:");
	    scanf("%d",&n);
	    printf("The reverse of the number is %d\n",palindrome(n));
	    break;
	case 4:
	    //fibonacci();
	    break;
	case 5:
	    record();
	    break;
	case 10:
		exit(0);


	default:
	    printf("Something's wrong,try again");
	    break;
	}

    }
    return 0;
}
int palindrome(int num){
    int rem,sum=0;
    while(num!=0){
	rem=num%10;
	sum=sum*10 + rem;
	num=num/10;
    }
    return sum;
}
int armstrong(int num){
    int rem,sum=0;
    while(num!=0){
	rem=num%10;
	sum=sum+rem*rem*rem;
	num=num/10;
    }
    return sum;
}
void record(){
    FILE *fp;
    info *folks;
    int n,i;
    fp = fopen("theinfo.txt","wb+");
    printf("How many people do you want to store the informations of?:");
    scanf("%d",&n);
    folks = (info*) calloc(n,sizeof(info));
    if(folks==NULL){
	printf("Failed");
    }
    printf("Now enter the following informations:\n");
    for(i=0; i<n; i++){
	printf("Person %d\nName:");
	scanf("%s",folks->name+i);
	printf("Id:");
	scanf("%d",folks->id+i);
	printf("Age:");
	scanf("%d",folks->age+i);
	fwrite(folks+i,sizeof(*(folks)),1,fp);
    }

fread(folks+i,sizeof(*(folks)),1,fp);
	for(i=0;i<n;i++)
	printf("%s\n %d\n %d\n",folks->name+i,folks->id+i,folks->age+i);

	getch();


    fclose(fp);
	main();

    printf("alright check it out");


}
