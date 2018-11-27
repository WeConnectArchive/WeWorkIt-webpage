CREATE TABLE "Employee" (
	"ID" serial NOT NULL UNIQUE,
	"Nick" TEXT NOT NULL UNIQUE,
	"Name" TEXT NOT NULL,
	"Surename" TEXT NOT NULL,
	"Mail" TEXT NOT NULL UNIQUE,
	"Phonenumber" TEXT NOT NULL UNIQUE,
	"About" TEXT,
	"Password" TEXT NOT NULL,
	"Subscription" DATE NOT NULL,
	"RegistrationTIme" DATE NOT NULL,
	"Points" integer NOT NULL DEFAULT '0',
	CONSTRAINT Employee_pk PRIMARY KEY ("ID")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "EmployerBig" (
	"ID" serial NOT NULL UNIQUE,
	"Nick" TEXT NOT NULL UNIQUE,
	"CName" TEXT NOT NULL UNIQUE,
	"NIP" TEXT NOT NULL UNIQUE,
	"Mail" TEXT NOT NULL UNIQUE,
	"Password" TEXT NOT NULL,
	"About" TEXT,
	"Subscription" DATE NOT NULL,
	"RegistrationTime" DATE NOT NULL,
	CONSTRAINT EmployerBig_pk PRIMARY KEY ("ID")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "EmployerSmall" (
	"ID" serial NOT NULL UNIQUE,
	"Nick" TEXT NOT NULL UNIQUE,
	"Name" TEXT NOT NULL,
	"Surename" TEXT NOT NULL,
	"About" TEXT NOT NULL,
	"Mail" TEXT NOT NULL UNIQUE,
	"Password" TEXT NOT NULL,
	"Subscription" DATE NOT NULL,
	"RegistrationTime" DATE NOT NULL,
	CONSTRAINT EmployerSmall_pk PRIMARY KEY ("ID")
) WITH (
  OIDS=FALSE
);






