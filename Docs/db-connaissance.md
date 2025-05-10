**Chat GPT Prompt**
Empathy Formateur:
mindmap
root((Formateur))
Dit
Dit\["Je ne sais pas quels élèves ont des problèmes."]
Dit\["Si les élèves ne terminent pas les tutoriels ou projets à temps, je ne sais pas pourquoi."]
Fait
Fait\["Je consacre beaucoup de temps à compiler et examiner les données des élèves."]
Fait\["J'utilise Google Sheets pour suivre les progrès, mais ce n'est pas suffisant."]
Besoin
Besoin\["Une vue claire de la progression de chaque élève."]
Besoin\["Visibilité sur les élèves en difficulté ou à la traîne."]
Besoin\["Des outils pour suivre les raisons des retards dans les tutoriels ou projets."].
Empathy Apprenant:
mindmap
root((Apprenant))
Dit
Dit\["Je veux comprendre clairement ma progression."]
Dit\["Je me sens frustré(e) lorsque je ne sais pas où je rencontre des difficultés."]
Dit\["J'ai besoin d'aide lorsque je ne peux pas terminer les tutoriels ou projets à temps."]
Fait
Fait\["Je passe du temps à revoir mes propres progrès."]
Fait\["Je me sens anxieux/-se à l'idée de prendre du retard."]
Fait\["Parfois, je suis ma progression de façon informelle, mais ce n'est pas organisé."]
Besoin
Besoin\["Une vue détaillée de ma progression globale."]
Besoin\["Des retours sur mes performances et des axes d'amélioration."]
Besoin\["Des outils ou un soutien pour surmonter les défis dans les tutoriels ou projets."].

# Définition du Problème

## Contexte

Les formateurs rencontrent des difficultés à suivre efficacement la progression des élèves dans les programmes d’auto-formation, en particulier pour les tutoriels et les projets. Actuellement, les outils utilisés, tels que Google Sheets, sont insuffisants pour fournir une vue claire et structurée.

## Problème

* Les formateurs manquent de visibilité claire sur la progression individuelle des élèves.
* Ils ne savent pas quels élèves rencontrent des problèmes ou prennent du retard.
* Il est difficile d’identifier les raisons des retards dans les tutoriels ou les projets..
  Use case: @startuml
  left to right direction
  actor Étudiant
  actor Formateur

rectangle "package\_suivi\_avancement\_autoformation" {
usecase "Suivre sa progression" as UC1
usecase "Visualiser les modules terminés et restants" as UC3
usecase "Modifier ou Supprimer ses liens" as UC8
usecase "Ajouter des liens" as UC9
usecase "Accéder aux rapports d'avancement" as UC4
usecase "Fournir des commentaires sur l'avancement" as UC5
}

Étudiant -- UC1
Étudiant -- UC3
Étudiant -- UC8
Étudiant -- UC9

Formateur -- UC4
Formateur -- UC5

@enduml.
classDiagram
class Apprenant {
+id: int
+nom: string
+email: string
+password: string
}

```
class Autoformation {
    +id: int
    +titre: string
    +description : string
    +start_date: date
    +end_date: date
}

class Tuto {
    +id: int
    +titre: string
    +contenu: string
    +order:int
    +progression: string
}

class Formation {
    +id: int
    +titre: string
    +description: string

}

class Realisation {
    +id: int
    +date: Date
    +status: string
    +commentaire: string
}


%% Relationships
Apprenant "1" -- "*" Autoformation : suit
Formation "1" -- "*" Tuto : contient
Formation "1" -- "*" Autoformation : contient
Autoformation "1" -- "*" Realisation : suit
Tuto "1" -- "1" Realisation : estLiéeÀ.
```

give me problrmatique

**Problématique**

Comment concevoir et déployer une plateforme de suivi de l’auto-formation qui permette à la fois :

1. Aux formateurs

   * d’obtenir en temps réel une vue claire et consolidée de la progression de chaque apprenant,
   * d’identifier rapidement ceux qui rencontrent des difficultés ou sont en retard,
   * de comprendre les causes des retards (blocages techniques, manque de temps, incompréhension du contenu, etc.) et d’y remédier par un accompagnement ciblé ;

2. Aux apprenants

   * de visualiser de manière détaillée et structurée leur propre avancement (modules complétés, en cours, restants),
   * de recevoir des retours personnalisés sur leurs performances et des axes d’amélioration,
   * de disposer d’outils d’aide et de motivation pour surmonter les obstacles et respecter les échéances.

L’enjeu est de remplacer les solutions artisanales (Google Sheets, suivi informel) par un système unifié, interactif et intuitif, garantissant transparence, efficience pédagogique et meilleure collaboration entre formateurs et apprenants.
