<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 22/12/17
 * Time: 14:34
 */

namespace App\Model;


use Monolog\Logger;
use Pimple\Container;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class ApplicationCommand extends Command {

	/**
	 * @var Container
	 */
	protected $container;

	/**
	 * @var Logger
	 */
	protected $log;


	/**
	 * ApplicationCommand constructor.
	 *
	 * @param null|string $name
	 * @param Container $container
	 */
	public function __construct( $name, Container $container ) {
		$this->container = $container;
		parent::__construct( $name );

		// Initiates logging
		$this->log = $this->container['main_logger'];
		if ( ! $this->log instanceof Logger ) {
			throw new \InvalidArgumentException( "Container main_logger entry must be Logger type" );
		}
	}

	/**
	 * @inheritdoc
	 */
	protected function configure() {
		// TODO add common configuration
	}

	/**
	 * @inheritdoc
	 */
	protected function execute( InputInterface $input, OutputInterface $output ) {
		// TODO add common execute
	}
}