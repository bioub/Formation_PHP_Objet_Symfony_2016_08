<?php

namespace Prepavenir\AliceBundle\Command;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Logging\EchoSQLLogger;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\SchemaTool;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AliceLoadCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('alice:load')
            ->setDescription('Charge les fichiers de fixture Alice')
            ->addArgument('fixturePath', InputArgument::REQUIRED, 'Le chemin vers le fichier YAML')
            ->addOption('drop', null, InputOption::VALUE_NONE, 'Supprime les tables')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fixturePath = $input->getArgument('fixturePath');

        $projectPath = $this->getContainer()->getParameter('kernel.root_dir') . '/../';
        $fixturePath = $projectPath . $fixturePath;

        if (!file_exists($fixturePath)) {
            $output->writeln('Erreur : le chemin spécifié est introuvable');
            return;
        }

        $em = $this->getContainer()->get('doctrine.orm.entity_manager');

        $logger = new EchoSQLLogger();
        $em->getConfiguration()->setSQLLogger($logger);

        if ($input->getOption('drop')) {
            $tool = new SchemaTool($em);
            $metadatas = $em->getMetadataFactory()->getAllMetadata();
            $tool->dropSchema($metadatas);
            $tool->createSchema($metadatas);
        }

        $objects = \Nelmio\Alice\Fixtures::load($fixturePath, $em, [
            'locale' => 'fr_FR',
            'seed' => time()
        ]);

        $output->writeln('Objets insérés : ' . count($objects));
    }

}
