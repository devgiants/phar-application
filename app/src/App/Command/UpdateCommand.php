<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 07/04/17
 * Time: 10:46
 */

namespace App\Command;


use App\Model\ApplicationCommand;
use Herrera\Phar\Update\Manager;
use Herrera\Phar\Update\Manifest;
use KevinGH\Version\Version;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateCommand extends ApplicationCommand
{
    /**
     * @inheritdoc
     */
    protected function configure()
    {
        $this
            ->setName('self-update')
            ->setDescription('Updates application to the latest version')
        ;
    }

    /**
     * @inheritdoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = new Manager(Manifest::loadFile(self::MANIFEST_FILE_URL));
        $previousVersion = $this->getApplication()->getVersion();

        if($manager->update($this->getApplication()->getVersion(), true)) {
            $output->writeln("<fg=black;bg=green>Application was successfully updated from {$previousVersion} to {$manager->getManifest()->findRecent(Version::create($previousVersion))->getVersion()->__toString()}</>");
        } else {
            $output->writeln("<fg=black;bg=green>Application is up-to-date ({$previousVersion})</>");
        }
    }
}