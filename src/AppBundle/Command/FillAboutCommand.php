<?php

namespace AppBundle\Command;

use AppBundle\Entity\About;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FillAboutCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:fill-about')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');

        $about = new About();

        $leftColumn = <<<LEFT
Мы знаем толк в приключениях, мы ценим вкус испытаний, разбивающих туманное зеркало будней. Мы верим в необходимость личных подвигов, опыта преодоления своих ограничений, которые выстраиваем сами. Мы разрушаем стереотипы проведения выходных и корпоративных выездов «на природу с шашлыками». Мы не боимся нестандартных решений. Мы знаем секреты побед - командных и личных. Те, кто хоть раз погрузился в историю, которую мы создаем, потом возвращаются снова и снова – одни, с детьми и со своей командой. Каждый участник проекта открывает что-то новое в себе и других и меняет свою жизнь на основе этих открытий.
<br><br>
Мы предлагаем проекты для каждого – если вы хотите провести свой день рожденья или другой праздник на природе, совершая открытия и погружаясь в атмосферу приключений, мы ждем вас!
LEFT;

        $rightColumn = <<<RIGHT
Маленькие любители сказок и приключений, замучившие родителей вопросами и просьбами «поиграть» - для вас приготовлены игры-квесты, в которых есть все условия для потрясающих открытий и невероятных приключений.
<br><br>
Мы готовы помогать директорам фирм и компаний в формировании сплоченной команды, работающей на единую цель – наши корпоративные проекты ждут вас! В условиях, максимально приближенных к «боевым», вы проверите, кто чего стоит и кто готов работать до последнего ради достижения единой цели.
RIGHT;

        $about->setTitle('О компании');
        $about->setLeftColumn($leftColumn);
        $about->setRightColumn($rightColumn);

        $em->persist($about);
        $em->flush();

        $output->writeln('About page successfully created!');
    }
}