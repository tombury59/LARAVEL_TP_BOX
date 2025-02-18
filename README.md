# 🧾 Système de Gestion de Factures

## Lien de PROD

http://tom.bury.angers.mds-project.fr/

## 👥 Utilisateurs de Test

### 🔑 Administrateur
- **Email** : `tombury59@hotmail.com`
- **Mot de passe** : `password`
- **Rôle** : Accès **complet** à toutes les fonctionnalités

### 🔐 Utilisateur Standard
- **Email** : `test@test.test`
- **Mot de passe** : `password`
- **Rôle** : Accès **limité** 

---

## 📌 Fonctionnalités

### 📅 Gestion des Réservations
✔ Voir la liste des **réservations**  
✔ Créer de nouvelles **réservations** avec **association de contrat**  
✔ Suivre les **dates de début** des réservations

### 📜 Gestion des Contrats
✔ **Création automatique** de contrat avec les réservations  
✔ **Consultation** des détails et statuts des contrats  
✔ Liaison des contrats aux **factures**

### 🧾 Gestion des Factures
✔ Création de **factures mensuelles** pour les contrats  
✔ Numérotation automatique des factures :  
`AAAAMMJJ_IDContrat_NuméroSéquence`  
✔ Configuration des **dates de paiement** et **montants**  
✔ Suivi des **périodes de facturation**  
✔ Consultation détaillée des **factures**  
✔ Liste des factures avec options de **filtrage**

### 📊 Calcul des Périodes
✔ **Calcul automatique** des périodes basé sur la date de début du contrat  
✔ Affichage des périodes au format **Mois Année**  
✔ Suivi des **numéros de période séquentiels**

---

## 🎨 Interface Utilisateur
🎨 **Design responsive** avec **Tailwind CSS**  
✅ **Validation des formulaires** et gestion des erreurs  
📄 Vue détaillée des **factures avec format imprimable**  
🔄 **Navigation fluide** entre listes et vues détaillées  
