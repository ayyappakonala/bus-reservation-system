#include<stdio.h>
#include<stdlib.h>
struct node
{
	int data;
	struct node* left;
	struct node* right;
};
struct node* root=NULL;
void insert(int x)
{
	struct node* t=(struct node*)malloc(sizeof(struct node));
	t->data=x;
	if(root==NULL)
	{
		root=t;
	}
	else
	{
		struct node* p=root;
		struct node* q=root;
		while(p!=NULL)
		{
			q=p;
			if(x>=p->data)
			{
				p=p->right;
			}
			else
			{
				p=p->left;
			}
		}
		if(x>q->data)
		{
			q->right=t;
		}
		else
		{
			q->left=t;
		}
	}
}
void inorder(struct node* k)
{
	if(k!=NULL)
	{
		inorder(k->left);
		printf("%d",k->data);
		inorder(k->right);
	}
	else
	{
		return ;
	}
}
int main()
{
	int i,n,v;
	printf("enter the no. nodes of tree\n");
	scanf("%d",&n);
		for(i=0;i<n;i++)
	{
		scanf("%d",&v);
		insert(v);	  
	}

	inorder(root);
	return 0;	 
}

