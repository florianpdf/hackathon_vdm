hackathon_1_2017
================

# Content
Premier hackathon élève promo 3 WCS sur le thème VDM au camping

## Access
1. /article ==> CRUD for create article
2. /event ==> CRUD for create event

#### Pré-requis: 
composer ==> [Install Composer](https://getcomposer.org/doc/00-intro.md)

#### Initialisation du projet
1. **Avec ssh**: git clone git@github.com:florianpdf/hackathon_vdm.git 
2. **Sans ssh**: git clone https://github.com/florianpdf/hackathon_vdm.git
3. cd atelier_upload_sf
4. composer install
5. php bin/console doctrine:database:create
6. php bin/console doctrine:schema:update --force

A Symfony 3.2 project created on March 24, 2017, 12:35 am.
