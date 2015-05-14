<?php
/*
 * This file is part of the php-ansible package.
 *
 * (c) Marc Aschmann <maschmann@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Asm\Tests\Ansible\Command;


use Asm\Ansible\Command\AnsibleGalaxy;
use Asm\Ansible\Command\AnsibleGalaxyInterface;
use Asm\Test\AnsibleTestCase;
use Symfony\Component\Process\ProcessBuilder;

class AnsibleGalaxyTest extends AnsibleTestCase
{
    /**
     * @return AnsibleGalaxyInterface
     */
    public function testCreateInstance()
    {
        $process = new ProcessBuilder();
        $process
            ->setPrefix($this->getGalaxyUri())
            ->setWorkingDirectory($this->getProjectUri());

        $ansibleGalaxy = new AnsibleGalaxy($process);

        $this->assertInstanceOf('\Asm\Ansible\Command\AnsibleGalaxy', $ansibleGalaxy);

        return $ansibleGalaxy;
    }

    /**
     * @depends testCreateInstance
     * @param AnsibleGalaxyInterface $command
     */
    public function testExecute(AnsibleGalaxyInterface $command)
    {
        $command->execute();
    }
}